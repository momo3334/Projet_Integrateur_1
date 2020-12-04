<?php

class Client
{
    private $_name;
    private $_prenom;
    private $_courriel;
    private $_mdp;
    private $_id;

    public function __construct($courriel, $mdp)
    {
        $this->set_courriel($courriel);
        $this->set_mdp($mdp);
    }

    function check_username()
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet_integrateur_2020;charset=utf8', 'root', '');

        $sql_check_courriel = "SELECT * FROM tbl_employe WHERE courriel='" . $this->_courriel . "'" . "AND mdp='" . $this->_mdp . "'";
        $result_check_courriel = $bdd->query($sql_check_courriel);

        while ($row_check_courriel = $result_check_courriel->fetch()) {

            if ($row_check_courriel["courriel"] == $this->_courriel && $row_check_courriel["mdp"] == $this->_mdp) {

                $this->set_name($row_check_courriel["nom"]);
                $this->set_prenom($row_check_courriel["prenom"]);
                $this->set_id($row_check_courriel["id_employe"]);

                $bdd = null;
                return true;
            } else {
                $bdd = null;
                return false;
            }
        }
    }

    function get_name()
    {
        return $this->_name;
    }
    function get_prenom()
    {
        return $this->_prenom;
    }
    function get_courriel()
    {
        return $this->_courriel;
    }
    function get_mdp()
    {
        return $this->_mdp;
    }
    function get_id()
    {
        return $this->_id;
    }



    function set_name($name)
    {
        $this->_name = $name;
    }
    function set_prenom($prenom)
    {
        $this->_prenom = $prenom;
    }
    function set_courriel($courriel)
    {
        $this->_courriel = $courriel;
    }
    function set_mdp($mdp)
    {
        $this->_mdp = $mdp;
    }
    function set_id($id)
    {
        $this->_id = $id;
    }
}
