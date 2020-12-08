<?php include "inc/header.php" ?>

<?php
    if(isset($_SESSION["client"])){
        echo '
        <div>
            <ul>
                <li>
                    Prénom : ' . $_SESSION["client"]->get_prenom() . '
                </li>
                <li>
                    Nom :' . $_SESSION["client"]->get_name() . '
                </li>
                <li>
                    Courriel :' . $_SESSION["client"]->get_courriel() . '
                </li>
            </ul>

            <ul>';
            $bdd = DbService::connectToDb();

            $sql_commentaires = "SELECT * FROM tbl_commentaire WHERE id_employe = (SELECT id_employe FROM tbl_employe WHERE id_employe = " .  $_SESSION["client"]->get_id(). ")";
            $result_commentaires = $bdd->query($sql_commentaires);
            $numCommentaire = 1;
           
            while($commentaire = $result_commentaires->fetch()){
                echo 
                '<li>
                    Commentaire ' . $numCommentaire . ' : ' . $commentaire["commentaire"] . '
                </li>';

                $numCommentaire++;
            }
            '</ul>
        </div>';
    }else {
        echo '
        <div class="flex justify_center" id="div_tryagain">
            <h1>
                <div class="flex justify_center">
                    Oups! Il semble que vous n\'ayez pas de compte
                </div>
            
                <div class="flex justify_center">
                    Veuillez réessayer
                </div>
            </h1>
        
            <div class="flex justify_center">
                <h3>
                    <li class="menu flex button_class" id="button_tryagain">
                        <a href="connection.php">Ici</a>
                    </li>
                </h3>
            </div>
        </div>';
    }
?>

<?php include "inc/footer.php" ?>