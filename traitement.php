<?php
include "inc/header.php";
?>

<div class="flex justify_center" id="div_traitement">
    <?php
    if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'login') {
        $courriel = $_REQUEST['courriel_user'];
        $mdp = $_REQUEST['mdp_user'];

        if (Client::check_username($courriel, $mdp)) {
            $_SESSION["client"] = Client::get_ClientFromDb($courriel);
            echo '<h1>Bonjour ' . $_SESSION["client"]->get_prenom() . '!</h1>';
        } else {
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
    } else if (isset($_REQUEST['deconnect'])) {
        echo "<h1>Au revoir " . $_SESSION["client"]->get_prenom() . "!</h1>";
        session_destroy();
    }

    ?>
</div>

<?php include "inc/footer.php" ?>