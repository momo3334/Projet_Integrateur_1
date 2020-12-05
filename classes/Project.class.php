<?php
class Project
{
    private $_id;
    private $_title;

    public function __construct($p_id, $p_title) {
        $this->_id = $p_id;
        $this->_title = $p_title;
    }

    public function get_id(){ return $this->_id; }

	public function set_id($p_id){ $this->_id = $p_id; }
    
    public function get_title(){ return $this->_title; }

	public function set_title($p_title){ $this->_title = $p_title; }
}


?>