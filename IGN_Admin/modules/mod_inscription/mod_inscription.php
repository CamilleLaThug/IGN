<?php
require_once('include/module_generique.php');
require_once('controleur_inscription.php');

class ModInscription extends ModuleGenerique{

	private $ca;
	
	function __construct(){
		$this->controleur = new ControleurInscription();

		if(isset($_GET['action'])){
			$action = $_GET['action'];
		}else{
			$action = "default";
		}

		$this->action($action);
	}

	function action($action){
		switch ($action) {
			case 'confirme':
				$this -> controleur->inscription();
				break;
			default:
				$this -> controleur->form_inscription();
				break;
		}
	}
}

?>