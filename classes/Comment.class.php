<?php
class Comment
{
    private $_id;
    private $_comment;
    private $_idTask; 
    private $_idEmploye; 

    public function __construct($p_id, $p_comment, $p_idTask, $p_idEmploye) {
        $this->_id = $p_id;
        $this->_comment = $p_comment;
        $this->_idTask = $p_idTask;
        $this->_idEmploye = $p_idEmploye;
    }

	/****** Display ******/
    public function PrintSelf()
    {
   		// Wrapper
   		echo '<div class="div_comment">';
	
   		// Comment
   		echo '<div class="div_comment_text">';
   		echo $this->get_comment();
		echo '</div>';
		   
   		//Employe
   		echo '<div class="div_comment_employe">';
   		echo 'id Employe: ' . $this->get_idEmploye() . '.';
   		echo '</div>';
	
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
	 * Get the value of _comment
	 */
	public function get_comment() { return $this->_comment; }

	/**
	 * Set the value of _comment
	 */
	public function set_comment($_comment){ $this->_comment = $_comment; return $this; }

	/**
	 * Get the value of _idTask
	 */
	public function get_idTask() { return $this->_idTask; }

	/**
	 * Set the value of _idTask
	 */
	public function set_idTask($_idTask){ $this->_idTask = $_idTask; return $this; }

	/**
	 * Get the value of _idEmploye
	 */
	public function get_idEmploye() { return $this->_idEmploye; }

	/**
	 * Set the value of _idEmploye
	 */
	public function set_idEmploye($_idEmploye){ $this->_idEmploye = $_idEmploye; return $this; }
}
?>