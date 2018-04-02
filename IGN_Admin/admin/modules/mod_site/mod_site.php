<?php

require_once('include/module_generique.php');
require_once('controleur_site.php');

class ModSite extends ModuleGenerique{


	function __construct(){
		$this->controleur = new ControleurSite();

		if(isset($_GET['action'])){
			$action = $_GET['action'];
		}else{
			$action = "default";
		}

		$this->action($action);
	}

	function action($action){
		switch ($action) {
			case 'edit':
				$this->controleur->edit_site();
				break;
			default:
				$this->controleur->affiche_vue();
				break;
		}
	}


}

?>