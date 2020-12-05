<?php 
include "inc/header.php";
$employeProjects = $_SESSION["client"]->getClientProjects();
?>
<div class="user-projects">
    <ul>
    <?php
    foreach ($employeProjects as $p)
    {
        echo "<li>" . $p->get_title() . "</li>";
    }
    ?>
    </ul>
</div>


<?php include "inc/footer.php" ?>