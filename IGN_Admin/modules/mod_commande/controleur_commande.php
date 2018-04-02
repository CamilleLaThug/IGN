<?php
require_once('vue_commande.php');
require_once('modele_commande.php');
require_once('./include/controleur_generique.php');

class ControleurCommande extends ControleurGenerique{

	function __construct(){
		$this -> vue = new VueCommande();
		$this -> modele = new ModeleCommande();
	}

	function form_commande(){
		if(isset($_SESSION['id'])){
			$this -> vue -> vue_commande();
		}else{
			$this->vue->vue_erreur("Vous n'etes pas connecté");
		}
		
	}

	function form_commande_modifier(){
		$this->vue->vue_commande_modifier();
	}

	function commande_modifier(){
		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']);
		$id = $_SESSION['id'];
		if(isset($nom) && isset($prenom) && !empty($nom) && !empty($prenom)){
			$this->modele->modele_commande_modifier($nom, $prenom, $id);
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
