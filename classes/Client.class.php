<?php

class Client
{
	private $_name;
	private $_prenom;
	private $_courriel;
	private $_id;

	public function __construct($id, $nom, $prenom,$courriel)
	{
		$this->set_id($id);
		$this->set_name($nom);
		$this->set_prenom($prenom);
		$this->set_courriel($courriel);
	}

	public static function check_username($courriel, $mdp)
	{
		return DbService::executeProcedure("CheckCredentials", array($courriel, $mdp), true);
	}
	
	public static function get_ClientFromDb($courriel)
	{
		$result = DbService::executeProcedure("GetEmployeByEmail", array($courriel), true, true, true);
		if (count($result) > 0) {
			$result = $result[0];
			$client = new Client($result["id_employe"],$result["nom"],$result["prenom"],$result["courriel"]);
		}
		return $client;
	}

	public function getClientProjects()
	{
		$projects = DbService::executeProcedure("GetEmployeProjects",array($this->get_id()), true, true, true);
		if (count($projects) > 0) {
			$projectsObj = array();
			foreach ($projects as $p) {
				array_push($projectsObj, new Project($p["id_projet"],$p["titre"]));
			}
		}
		return $projectsObj;
	}

	public function getAllProjects()
	{
		$projects = DbService::executeProcedure("GetProjects", null, true, true, false);
		if (count($projects) > 0) {
			$projectsObj = array();
			foreach ($projects as $p) {
				array_push($projectsObj, new Project($p["id_projet"],$p["titre"]));
			} 
		}
		return $projectsObj;
	}

	public function get_name()
	{
		return $this->_name;
	}

	public function get_prenom()
	{
		return $this->_prenom;
	}

	public function get_courriel()
	{
		return $this->_courriel;
	}

	public function get_id()
	{
		return $this->_id;
	}

	public function set_name($name)
	{
		$this->_name = $name;
	}

	public function set_prenom($prenom)
	{
		$this->_prenom = $prenom;
	}

	public function set_courriel($courriel)
	{
		$this->_courriel = $courriel;
	}

	public function set_id($id)
	{
		$this->_id = $id;
	}
}
