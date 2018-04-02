<?php
require_once('vue_profil.php');
require_once('modele_profil.php');
require_once('./include/controleur_generique.php');

class ControleurProfil extends ControleurGenerique{

	function __construct(){
		$this -> vue = new VueProfil();
		$this -> modele = new ModeleProfil();
	}

	function form_profil(){
		if(isset($_SESSION['id'])){
			$this -> vue -> vue_profil();
		}else{
			$this->vue->vue_erreur("Vous n'etes pas connecté");
		}
		
	}

	function form_profil_modifier(){
		$this->vue->vue_profil_modifier();
	}

	function profil_modifier(){
		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']);
		$id = $_SESSION['id'];
		if(isset($nom) && isset($prenom) && !empty($nom) && !empty($prenom)){
			$this->modele->modele_profil_modifier($nom, $prenom, $id);
		}else{
			$this->vue->vue_erreur("Remplissez tous les champs");
		}
		
	}

	function getModele(){
		return $this->modele;
	}

	function getVue(){
		return $this->vue;
	}

}


?>
