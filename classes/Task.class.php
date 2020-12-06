<?php
class Task
{
    private $_id;
    private $_title;
    private $_description;
    private $_dueDate;
    private $_idEmploye;
    private $_idPriority;
    private $_idProject;
    private $_comments; 

    public function __construct($p_id, $p_title, $p_description, $p_dueDate, $p_idEmploye, $p_idPriority, $p_idProject) {
        $this->_id = $p_id;
        $this->_title = $p_title;
        $this->_description = $p_description;
        $this->_dueDate = $p_dueDate;
        $this->_idEmploye = $p_idEmploye;
        $this->_idPriority = $p_idPriority;
        $this->_idProject = $p_idProject;

        $this->_comments = array();
        $comments = DbService::executeProcedure("GetTaskComments", array($this->_id), true, true, false);

        if (!empty($comments)) {
            foreach ($comments as $c) {
            $newComment = new Comment (
                                 $c["id_commentaire"], 
                                 $c["commentaire"], 
                                 $c["id_tache"], 
                                 $c["id_employe"]
                                );
            array_push($this->_comments, $newComment);
            }
        }
    }

    /****** Display ******/
    public function PrintSelf()
    {
        // Wrapper
        echo '<div class="div_task">';

        // Title
        echo '<div class="div_task_title">';
        echo $this->get_title();
        echo '</div>';

        // Description
        echo '<div class="div_task_description">';
        echo '<p>Description : ' . $this->get_description(). '</p>';
        echo '</div>';

        // DueDate
        echo '<div class="div_task_due_date">';
        echo '<p>Échéance: ' . $this->get_dueDate() . '</p>';
        echo '</div>';

        //Employe
        echo '<div class="div_task_employe">';
        echo 'id Employe: ' . $this->get_idEmploye() . '.';
        echo '</div>';

        //Comments
        if (!empty($this->getComments())) {
            foreach ($this->getComments() as $c) {
                echo '<div class="div_comment_container">';
                echo '<p>Commentaires</p>';
                $c->PrintSelf();
                echo '</div>';
            }
        }
        echo '</div>';
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
	 * Get the value of _description
	 */
	public function get_description() { return $this->_description; }

	/**
	 * Set the value of _description
	 */
	public function set_description($_description){ $this->_description = $_description; return $this; }

	/**
	 * Get the value of _dueDate
	 */
	public function get_dueDate() { return $this->_dueDate; }

	/**
	 * Set the value of _dueDate
	 */
	public function set_dueDate($_dueDate){ $this->_dueDate = $_dueDate; return $this; }

	/**
	 * Get the value of _idEmploye
	 */
	public function get_idEmploye() { return $this->_idEmploye; }

	/**
	 * Set the value of _idEmploye
	 */
	public function set_idEmploye($_idEmploye){ $this->_idEmploye = $_idEmploye; return $this; }

	/**
	 * Get the value of _idPriority
	 */
	public function get_idPriority() { return $this->_idPriority; }

	/**
	 * Set the value of _idPriority
	 */
	public function set_idPriority($_idPriority){ $this->_idPriority = $_idPriority; return $this; }

	/**
	 * Get the value of _idProject
	 */
	public function get_idProject() { return $this->_idProject; }

	/**
	 * Set the value of _idProject
	 */
	public function set_idProject($_idProject){ $this->_idProject = $_idProject; return $this; }

	/**
	 * Get the value of comments
	 */
	public function getComments() { return $this->_comments; }

	/**
	 * Set the value of comments
	 */
    public function setComments($comments){ $this->_comments = $comments; return $this; }
    
	/**
	 * Get the value of one Comment Object
	 */
	public function getComment($commentIndex) { return $this->_comments[$commentIndex]; }

	/**
	 * Set the value of one Comment Object
	 */
    public function setComment($commentIndex, $comment){ $this->_comments[$commentIndex] = $comment; return $this; }

    /**
    * Add one Comment Object to the array of tasks.
    *
    * TODO: 
    * Insert the comment into the DB as well..
	*/
    public function add_comment(Comment $_comment)
    {
        array_push($this->_comments, $_comment);
    }
}


?>