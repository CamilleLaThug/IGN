<?php

require_once('include/controleur_generique.php');
require_once('include/module_generique.php');
require_once('controleur_grilleSynthese.php');


class ModGrilleSynthese extends ModuleGenerique {

	function __construct() {

		$action = isset($_GET['action']) ? $_GET['action'] : "default";		

		parent::__construct();
		
		$this -> controleur = new ControleurGrilleSynthese();

		switch ($action) {
			case 'form_grilleSynthese':
				$this->controleur->form_grilleSynthese();
				break;

			default:
				$this->controleur->form_grilleSynthese();
				break;
		}
	}
}

?>