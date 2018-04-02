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
			case "ajout":
				$this->controleur->produit_ajouter();
				break;
			default:
				//$this -> controleur->categorie_affiche();
			$this -> controleur->produit_affiche();
			$this -> controleur->produit();
			break;
		}
	}
}

?>