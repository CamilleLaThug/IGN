<?php
require_once('include/module_generique.php');
require_once('controleur_commande.php');

class ModCommande extends ModuleGenerique{

	private $ca;
	
	function __construct(){
		$this->controleur = new ControleurCommande();

		if(isset($_GET['action'])){
			$action = $_GET['action'];
		}else{
			$action = "default";
		}

		$this->action($action);
	}

	function action($action){
		switch ($action) {
			case 'modifier':
				$this->controleur->form_commande_modifier();
				break;
			case 'valider':
				$this->controleur->commande_modifier();
				break;
			default:
				$this->controleur->form_commande();
				break;
		}
	}
}

?>