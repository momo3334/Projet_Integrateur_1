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
<button class="div_project_container">Projet 1</button>
    <div class="div_project">
        <p>
        </p>
    </div>

<button class="div_project_container">Projet 2</button>
    <div class="div_project">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>

<button class="div_project_container">Projet 3</button>
    <div class="div_project">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>

<button class="div_project_container">Projet 4</button>
    <div class="div_project">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>

<button class="div_project_container">Projet 5</button>
    <div class="div_project">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>


<?php include "inc/footer.php" ?>