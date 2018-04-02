<?php
require_once('include/module_generique.php');
require_once('controleur_admin.php');

class ModAdmin extends ModuleGenerique{

	
	function __construct(){
		$this->controleur = new ControleurAdmin();

		if(isset($_GET['action'])){
			$action = $_GET['action'];
		}else{
			$action = "default";
		}

		$this->action($action);
	}

	function action($action){
		switch ($action) {
			default:

			$this -> controleur->form_admin();
			break;
		}
	}
}

?>