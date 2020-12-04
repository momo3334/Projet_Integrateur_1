<?php
include "inc/header.php";
include "class/client.php";
?>

<div class="flex justify_center" id="div_traitement">
    <?php
    if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'login') {
        $_SESSION["client"] = new Client($_REQUEST['courriel_user'], $_REQUEST['mdp_user']);

        if ($_SESSION["client"]->check_username()) {
            $_SESSION["prenom"] = $_SESSION["client"]->get_prenom();
            echo '<h1>Bonjour ' . $_SESSION["prenom"] . '!</h1>';
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
        echo "<h1>Au revoir " . $_SESSION["prenom"] . "!</h1>";
        session_destroy();
    }

    ?>
</div>

<?php include "inc/footer.php" ?>