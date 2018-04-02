<?php
require_once('vue_inscription.php');
require_once('modele_inscription.php');
require_once('./include/controleur_generique.php');

class ControleurInscription extends ControleurGenerique{

	function __construct(){
		$this -> vue = new VueInscription();
		$this -> modele = new ModeleInscription();
	}

	function form_inscription(){
		$this -> vue -> formulaire_inscription();
	}

	function inscription(){

		$prenom = $_POST['prenom'];
		$nom = $_POST['nom'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password_verif = $_POST['password_verif'];

		if(empty($nom) || empty($email) || empty($password)){
			$this -> form_inscription();
			?><script>alert("Remplissez tous les champs");</script><?php 
		}else if ($password != $password_verif){
			$this -> form_inscription();
			?><script>alert("Les mots de passe entrés sont differents");</script><?php 
		}
		else if (strlen ($password) < 8) {
			$this -> form_inscription();
			?><script>alert("Les mots de passe entrés sont trop court, minimum 8 caracteres.");</script><?php 
		}
		else if ($this -> modele -> compteExistant($email) == true) {
			$this -> form_inscription();
			?><script>alert("Comptes deja existant");</script><?php 
		}else{
			$this -> modele -> ajout_utilisateur($nom, $prenom, $email, sha1($password));
			$this -> form_inscription();
			?><script>alert("Votre compte a été créé avec succés");</script><?php 
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
