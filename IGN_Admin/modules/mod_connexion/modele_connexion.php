<?php

class ModeleConnexion extends ModeleGenerique{
	/*
	function getMessage(){
		$requete = "SELECT nom FROM genres";
		$reqPrep = parent::$connexion->prepare($requete);
		$reqPrep->execute();
		return $reqPrep;
	}*/

	function compteInscrit($nom,$password){
		$requete = parent::$connexion->prepare('SELECT idMembre, nom, password, estAdmin FROM membre WHERE nom = :nom AND password = :pass');
		$requete->execute(array(
    	'nom' => $nom,
    	'pass' => $password));

		$resultat = $requete->fetch();

		if (!$resultat){
		    ?><script>alert("Mauvais identifiant ou mot de passe !");</script><?php
		}
		else{
			$_SESSION['id'] = $resultat['idMembre'];
		    $_SESSION['nom'] = $resultat['nom'];
		    $_SESSION['admin'] = $resultat['estAdmin'];
			?><script>alert("Bien connecté");</script><?php 
		}
	}

	function deco(){
		session_start();
		// Suppression des variables de session et de la session
		$_SESSION = array();
		session_destroy();
	}
}
?>
