<?php
class DbService
{
    public static function connectToDb()
    {
$bdd = new PDO('mysql:host=localhost;dbname=projzqce_todoist;charset=utf8', 'projzqce_jeromelemay', 'projecttodoist');

        if (isset($bdd)) {
            return $bdd;
        } else {
            return null;
        }
    }

    public static function executeProcedure(string $procedure, array $parameters = null, bool $returnsValue = false, bool $returnsTable = false, bool $multipleColumns = false)
    {
        $bdd = DbService::connectToDb();
        if (!is_null($bdd)) {
            if ($parameters != null) {
                $sql_statement = "CALL `{$procedure}`(";

                $paramNb = 0;
                foreach ($parameters as $p)
                {
                    $paramNb++;

                    if ($paramNb == count($parameters)) {
                        $sql_statement .= ":parameter{$paramNb}";
                    } else {
                        $sql_statement .= ":parameter{$paramNb}, ";
                    }
                }

                if ($returnsValue && !$returnsTable) {
                    $sql_statement .= ", @returnParam)";
                } else {
                    $sql_statement .= ")";
                }

                $stmt = $bdd->prepare($sql_statement);
                $paramNb = 0;

                foreach ($parameters as &$p)
                {
                    $paramNb++;

                    $paramType = gettype($p);
                    switch ($paramType) {
                        case "boolean":
                            $paramType = PDO::PARAM_BOOL;
                            break;
                        case "integer":
                            $paramType = PDO::PARAM_INT;
                            break;
                        case "double":
                            $paramType = PDO::PARAM_STR;
                            break;
                        case "string":
                            $paramType = PDO::PARAM_STR;
                            break;
                        default:
                            break;
                    }
                    $stmt->bindParam("parameter{$paramNb}", $p, $paramType);
                }
            }
            else {
                $sql_statement = "CALL `{$procedure}`();";
            }

            if (!isset($stmt)) {
                $stmt = $bdd->prepare($sql_statement);
            }

            if ($returnsValue) {
                $stmt->execute();
                
                if ($returnsTable) {
                    $result = $stmt->fetchAll();
                    return $result;
                } else {
                    $stmt->closeCursor();
                    $result = $bdd->query("SELECT @returnParam AS returnParam")->fetch(PDO::FETCH_ASSOC);
                    if ($result) {
                        return $result !== false ? $result['returnParam'] : null;
                    }
                }
            } else {
                $stmt->closeCursor();
                $stmt->execute();
            }
        }
    }

    public static function fetchResultToArray($fetchedResult, $multipleColumns = true)
    {
        $processed = array();
        if (!$multipleColumns) {
            while ($data = $fetchedResult->fetch(PDO::FETCH_NUM)) {
                array_push($processed, $data[0]);
            }
        }
        else {
            while ($data = $fetchedResult->fetch(PDO::FETCH_ASSOC)) {
                array_push($processed, $data);
            }
        }

        return $processed;
    }
}
