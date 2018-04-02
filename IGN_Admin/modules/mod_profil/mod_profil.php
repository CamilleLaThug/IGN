<?php
require_once('include/module_generique.php');
require_once('controleur_profil.php');

class ModProfil extends ModuleGenerique{

	private $ca;
	
	function __construct(){
		$this->controleur = new ControleurProfil();

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
				$this->controleur->form_profil_modifier();
				break;
			case 'valider':
				$this->controleur->profil_modifier();
				break;
			default:
				$this->controleur->form_profil();
				break;
		}
	}
}

?>