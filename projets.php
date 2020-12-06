<?php 
include "inc/header.php";
$employeProjects = $_SESSION["client"]->getClientProjects();
?>

<div class="div_project_list_wrapper">
<?php
    // Container
    echo '<div class="div_project_container">';
    foreach ($employeProjects as $p)
    {
        $p->PrintSelf();
    }
    echo '</div>';
?>

</div>


<button class="div_project_container">To Customize Display</button>
<div class="div_project">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>


<?php include "inc/footer.php" ?>