<?php
include "inc/header.php"; ?>
<div class="flex justify_center">
    <?php
    if (isset($_SESSION["client"])) {
    ?>
    <div class="div_calendrier flex justify_center">
        <?php find_Date(); ?>
    </div>
<?php
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
function find_Date()
{
    $bdd = DbService::connectToDb();
    $sql = "SELECT * FROM tbl_tache WHERE id_employe = (SELECT id_employe FROM tbl_employe WHERE id_employe = " .  $_SESSION["client"]->get_id() . ") ORDER BY(echeance)";
    $result = $bdd->query($sql);

    while ($row = $result->fetch()) {
        echo 'Date d\'échéance : ' . $row["echeance"];
        echo '<br>';
        echo 'Tâche : ' . $row["titre"];
        echo '<br>';
        echo 'Description : ' . $row["description"];
        echo '<br><br>';
    }
    $bdd = null;
}
?>
<?php include "inc/footer.php"; ?>