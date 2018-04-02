<?php

require_once('include/module_generique.php');
require_once('controleur_produit.php');

class ModProduit extends ModuleGenerique{


	function __construct(){
		$this->controleur = new ControleurProduit();

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
				$this -> controleur->add_produit();
				break;
			case 'edit':
				$this -> controleur->edit_produit();
				break;
			case 'del':
				$this -> controleur->delete_produit();
				break;
			default:
				$this->controleur->affiche_vue();
				break;
		}
	}


}

?>