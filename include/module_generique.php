<?php


class ModuleGenerique {


	protected $controleur;


	function __construct() {
		$this->controleur = new ControleurGenerique();
	}
	
	function getControleur() {
		return $this->controleur;
	}

}

?>