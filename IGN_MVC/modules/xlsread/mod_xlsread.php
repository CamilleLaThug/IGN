<?php

require_once('modules/xlsread/controleur_xlsread.php');

class ModXlsread extends ModuleGenerique {

	function __construct() {
		$action = isset($_GET['action']) ? $_GET['action'] : "default";

			$this -> controleur = new ControleurXlsread();

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
