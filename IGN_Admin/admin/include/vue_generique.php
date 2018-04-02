<?php
class VueGenerique{
	public $contenu;
	public $titre;

	function __construct(){
		$this->contenu="";
		$this->titre="";
		ob_start();
	}

	function tamponVersContenu(){
		$this->contenu= $this->contenu . ob_get_clean();
	}

	function vue_erreur($s){
		echo"$s rouge";
	}

	function vue_confirm($s){
		echo"$s vert";
	}

	function getTitre(){
		return $this->titre;
	}

	function getContenu(){
		return $this->contenu;
	}
}



?>
