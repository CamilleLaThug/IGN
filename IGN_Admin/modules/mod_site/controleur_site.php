<?php
require_once('vue_site.php');
require_once('modele_site.php');
require_once('./include/controleur_generique.php');

class ControleurSite extends ControleurGenerique{

	function __construct(){
		$this -> vue = new VueSite();
		$this -> modele = new ModeleSite();
	}

	function nom_site_modele(){
		return $this->modele->nom_site();
	}


	function getModele(){
		return $this->modele;
	}

	function getVue(){
		return $this->vue;
	}

}


?>
