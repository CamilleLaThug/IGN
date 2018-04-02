<?php
require_once('include/module_generique.php');
require_once('controleur_connexion.php');

class ModConnexion extends ModuleGenerique{

	private $ca;
	
	function __construct(){
		$this->controleur = new ControleurConnexion();

		if(isset($_GET['action'])){
			$action = $_GET['action'];
		}else{
			$action = "default";
		}

		$this->action($action);
	}

	function action($action){
		if(!(isset($_SESSION['id']))){
			switch ($action) {
				case 'confirme':
					$this->controleur->connexion();
				break;
				case 'deconnexion':
					$this->controleur->deconnexion();
					break;
				default:
					$this->controleur->form_connexion();
				break;
			}
		}else{
		echo "Vous etes deja connecté";
	}
	}
}

?>