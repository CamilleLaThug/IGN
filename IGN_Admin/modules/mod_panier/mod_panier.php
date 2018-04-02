<?php
require_once('include/module_generique.php');
require_once('controleur_panier.php');

class ModPanier extends ModuleGenerique{

	
	function __construct(){
		$this->controleur = new ControleurPanier();

		if(isset($_GET['action'])){
			$action = $_GET['action'];
		}else{
			$action = "default";
		}

		$this->action($action);
	}

	function action($action){
		switch ($action) {
			case "vider":
				$this->controleur->panier_vider();
			case "supprimerArticle":
				$this->controleur->panier_supprimerArticle();
			default:
				$this->controleur->panier_affiche();
			break;
		}
	}
}

?>