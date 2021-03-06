<?php
class Project
{
    private $_id;
    private $_title;
    private $_tasks; 

    public function __construct($p_id, $p_title) {
        $this->_id = $p_id;
        $this->_title = $p_title;

        $this->_tasks = array();
        $tasks = DbService::executeProcedure("GetProjectTasks", array($this->_id), true, true, false);
        foreach ($tasks as $t) {
            $newTask = new Task (
                                 $t["id_tache"], 
                                 $t["titre"], 
                                 $t["description"], 
                                 $t["echeance"], 
                                 $t["id_employe"],
                                 $t["prenom"] . ' ' . $t["nom"],
                                 $t["id_priorite"], 
                                 $this->_id
                                );
            array_push($this->_tasks, $newTask);
        }
    }

    /****** Display ******/
    public function PrintSelf()
    {
        // Accordeon
        echo "<button class='div_project_accordeon'>" . $this->get_title() . "</button>";
            //Wrapper
            echo '<div class="div_project">';
                if (!empty($this->get_tasks())) {
                    // Task Container
                    echo '<div class="div_task_container">';
                    // Task Container Title
                    echo '<div class="div_task_container_title">Tâches</div>';
                    foreach ($this->get_tasks() as $t) {
                        $t->PrintSelf();
                    }
                    echo '</div>';
                }
        echo '</div>';
    }

    public function sortTaskByDates(bool $asc = true)
    {
        $tasks = &$this->_tasks;
        if ($asc) {
            usort($tasks, "dateCompareAsc");

        } else {
            usort($tasks, "dateCompareDesc");
        }
        return null;
    }

    public function sortTaskByPriority(bool $asc = true)
    {
        $tasks = &$this->_tasks;
        if ($asc) {
            usort($tasks, "priorityCompareAsc");

        } else {
            usort($tasks, "priorityCompareDesc");
        }
        return null;
    }

    /****** Getters and Setters ******/
	/**
	 * Get the value of _id
	 */
	public function get_id() { return $this->_id; }

	/**
	 * Set the value of _id
	 */
	public function set_id($_id){ $this->_id = $_id; return $this; }

	/**
	 * Get the value of _title
	 */
	public function get_title() { return $this->_title; }

	/**
	 * Set the value of _title
	 */
	public function set_title($_title){ $this->_title = $_title; return $this; }

	/**
	 * Get the value of _tasks
	 */
	public function get_tasks() { return $this->_tasks; }

	/**
	 * Set the value of _tasks
	 */
    public function set_tasks($_tasks){ $this->_tasks = $_tasks; return $this; }
    
    /**
	 * Get the value of one Task Object
	 */
	public function get_task($taskIndex) { return $this->_tasks[$taskIndex]; }

	/**
	 * Set the value of one Task Object
	 */
    public function set_task($taskIndex,$_tasks){ $this->_tasks[$taskIndex] = $_tasks; return $this; }
    
    /**
	 * Add one Task Object to the array of tasks.
     * 
     * TODO: 
     * Insert the task into the DB as well..
	 */
    public function add_task(Task $_task)
    {
        array_push($this->_tasks, $_task);
    }
}


?>