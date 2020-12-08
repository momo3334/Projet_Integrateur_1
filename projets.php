<?php 
include "inc/header.php";
$employeProjects = $_SESSION["client"]->getClientProjects();
$filterCriteria = null;
$filterOrder = null;

function projectNameCompareAsc(Project $a, Project $b)
{
	return strcmp($a->get_title(), $b->get_title());
}

function projectNameCompareDesc(Project $a, Project $b)
{
	return !strcmp($a->get_title(), $b->get_title());
}

function projectPriorityCompareAsc(Project $a, Project $b)
{
	return ($a->get_task(0)->get_idPriority() > $b->get_task(0)->get_idPriority())? +1 : -1;
}

function projectPriorityCompareDesc(Project $a, Project $b)
{
	return ($a->get_task(0)->get_idPriority() < $b->get_task(0)->get_idPriority())? +1 : -1;
}


function projectDateCompareAsc(Project $a, Project $b)
{
	return ($a->get_task(0)->get_dueDate() < $b->get_task(0)->get_dueDate())? +1 : -1;
}

function projectDateCompareDesk(Project $a, Project $b)
{
	return ($a->get_task(0)->get_dueDate() > $b->get_task(0)->get_dueDate())? +1 : -1;
}

function dateCompareAsc(Task $a, Task $b)
{
	return ($a->get_dueDate() > $b->get_dueDate())? +1 : -1; 
}

function dateCompareDesc(Task $a, Task $b)
{
    return ($a->get_dueDate() < $b->get_dueDate())? +1 : -1;    	
}

function priorityCompareAsc(Task $a, Task $b)
{
    return ($a->get_idPriority() < $b->get_idPriority())? +1 : -1;    	
}

function priorityCompareDesc(Task $a, Task $b)
{
    return ($a->get_idPriority() > $b->get_idPriority())? +1 : -1;    	
}


if (isset($_POST["action"])) {   
    $action = $_POST["action"];
    if (isset($_POST["filterCriteria"])) {
        $filterCriteria = $_POST["filterCriteria"];
    }
    if (isset($_POST["filterOrder"])) {
        $filterOrder = $_POST["filterOrder"];
    }
}

//filtering received list
switch ($filterCriteria) {
    case 1:
        if($filterOrder == 'A'){
            usort($employeProjects, "projectNameCompareAsc");
        }else{
            usort($employeProjects, "projectNameCompareDesc");
        }
        break;
    case 2:
        if($filterOrder == 'A'){
            $employeProjects = $_SESSION["client"]->getAllProjects();
        }
        break;
    case 3:
        if($filterOrder == 'A'){
            foreach ($employeProjects as $p) {
                $p->sortTaskByDates();
            }
            usort($employeProjects, "projectDateCompareAsc");
        }else{
            foreach ($employeProjects as $p) {
                $p->sortTaskByDates(false);
            }
            usort($employeProjects, "projectDateCompareAsc");
        }
        break;
    case 4:
        if($filterOrder == 'A'){
            foreach ($employeProjects as $p) {
                $p->sortTaskByPriority();
            }
            usort($employeProjects, "projectPriorityCompareAsc");
        }else{
            foreach ($employeProjects as $p) {
                $p->sortTaskByPriority(false);
            }
            usort($employeProjects, "projectPriorityCompareDesc");
        }
        break;
    default:
        # code...
        break;
}

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
<?php include "inc/footer.php" ?>