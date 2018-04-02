<?php
require_once('vue_xlsread.php');
require_once('modele_xlsread.php');
require_once('./include/controleur_generique.php');

class ControleurXls extends ControleurGenerique {
	function __construct(){
		$this ->vue = new VueXls();
		$this->modele = new ModeleXls();
	}

	function  afficheXls(){
		$this ->vue-> afficheXls();
	}
}
?>