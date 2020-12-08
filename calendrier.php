<?php
include "inc/header.php"; ?>
<div id="div_calendrier">
    <?php
    if (isset($_SESSION["client"])) {

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
    ?>
</div>
<?php 
    function name(){
        $bdd = DbService::connectToDb();
    }
?>
<?php include "inc/footer.php"; ?>