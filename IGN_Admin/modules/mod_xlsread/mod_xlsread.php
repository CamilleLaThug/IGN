<?php
require_once('include/module_generique.php');
require_once('controleur_xlsread.php');

class ModXls extends ModuleGenerique {

	function __construct() {
		$action = isset($_GET['action']) ? $_GET['action'] : "default";

			$this -> controleur = new ControleurXls();

		switch ($action) {
			/* afficher l'acceuil*/
			case "afficheXls" :
				$this->controleur->afficheXls();
				break;
			default :
				$this->controleur->afficheXls();

		}
	}

}
?>