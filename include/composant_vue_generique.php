<?php


class ComposantVueGenerique {

	protected $contenu;

	public function __construct() {
		$this->contenu="";
	}

	function getTitre() {
		return $this->titre;
	}


	function getContenu() {
		return $this->contenu;
	}

}