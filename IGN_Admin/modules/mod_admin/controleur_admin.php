<?php
require_once('vue_admin.php');
require_once('modele_admin.php');
require_once('./include/controleur_generique.php');

class ControleurAdmin extends ControleurGenerique{

	function __construct(){
		$this -> vue = new VueAdmin();
		$this -> modele = new ModeleAdmin();
	}

	function form_admin(){
		$this -> vue -> admin_vue_global();
	}




	function getModele(){
		return $this->modele;
	}

	function getVue(){
		return $this->vue;
	}

}


?>
