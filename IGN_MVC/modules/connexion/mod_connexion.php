<?php

require_once('modules/connexion/controleur_connexion.php');

class ModConnexion extends ModuleGenerique {
	
	function __construct() {
		$action = isset($_GET['action']) ? $_GET['action'] : "default";

		$this->controleur = new ControleurConnexion();

		switch ($action) {
			case "form_connexion" :
				$this->controleur->form_connexion();
				break;
			case "authentification" :
				$this->controleur->authentification();
				break;
			case "deconnexion" :
				$this->controleur->deconnexion();
				break;
			default :
				$this->controleur->form_connexion();
		}
	}
}
