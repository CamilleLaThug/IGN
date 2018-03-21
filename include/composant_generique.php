<?php


class ComposantGenerique {

	protected $controleur;

	public function __construct() {
		
		$this->controleur= new ControleurGenerique();
	}


	public function getControleur() {
		return $this->controleur;
	}


}