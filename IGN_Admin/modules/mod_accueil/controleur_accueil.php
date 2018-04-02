<?php
require_once('vue_accueil.php');
require_once('modele_accueil.php');
require_once('./include/controleur_generique.php');


class ControleurAccueil extends ControleurGenerique{

	function __construct(){
		$this->modele = new ModeleAccueil();
		$this->vue = new VueAccueil();
	}


	function accueil(){
		$this->vue->affiche();;
	}

	function dlFile(){
		$this->vue->afficheFiche();
	}

	function getModele(){
		return $this->modele;
	}

	function getVue(){
		return $this->vue;
	}
}

?>
