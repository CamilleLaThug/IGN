<?php
require_once('vue_connexion.php');
require_once('modele_connexion.php');
require_once('./include/controleur_generique.php');

class ControleurConnexion extends ControleurGenerique{

	function __construct(){
		$this -> vue = new VueConnexion();
		$this -> modele = new ModeleConnexion();
	}

	function form_connexion(){
		$this->vue->formulaire_connexion();
	}

	function connexion(){
			$nom = $_POST['username'];
			$password = $_POST['pass'];

			if(empty($nom) || empty($password)){
				$this -> form_connexion();
			?><script>alert("Remplissez tous les champs");</script><?php 
			}else{
				$this->modele->compteInscrit($nom, $password);
				header('Location: index.php?module=accueil');
			}
	}

	function deconnexion(){
		$this->modele->deco();
		header('Location: index.php?module=connexion');
	}

	function getModele(){
		return $this->modele;
	}

	function getVue(){
		return $this->vue;
	}

}


?>
