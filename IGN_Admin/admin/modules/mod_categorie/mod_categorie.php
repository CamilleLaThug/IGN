<?php

require_once('include/module_generique.php');
require_once('controleur_categorie.php');

class ModCategorie extends ModuleGenerique{


	function __construct(){
		$this->controleur = new ControleurCategorie();

		if(isset($_GET['action'])){
			$action = $_GET['action'];
		}else{
			$action = "default";
		}

		$this->action($action);
	}

	function action($action){
		switch ($action) {
			case 'add':
				$this -> controleur->add_categorie();
				break;
			case 'edit':
				$this -> controleur->edit_categorie();
				break;
			case 'del':
				$this -> controleur->delete_categorie();
				break;
			default:
				$this->controleur->affiche_vue();
				break;
		}
	}


}

?>