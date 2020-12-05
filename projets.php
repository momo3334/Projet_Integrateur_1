<?php 
include "inc/header.php";
$employeProjects = $_SESSION["client"]->getClientProjects();
?>    
<?php
    foreach ($employeProjects as $p)
    {
        $p->PrintSelf();
    }
?>

<button class="div_project_container">To Customize Display</button>
<div class="div_project">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>


<?php include "inc/footer.php" ?>