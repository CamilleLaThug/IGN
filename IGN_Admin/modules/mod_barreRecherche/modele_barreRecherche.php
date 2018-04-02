<?php

require_once('C:\wamp64\www\site\siteWeb\include\modele_generique.php');

class ModelebarreRecherche extends ModeleGenerique{
	/*
	function getMessage(){
		$requete = "SELECT nom FROM genres";
		$reqPrep = parent::$connexion->prepare($requete);
		$reqPrep->execute();
		return $reqPrep;
	}*/

	function model_barreRecherche(){
		
		if(isset($_POST['barreRecherche'])){
			$barreRecherche = htmlspecialchars($_POST['barreRecherche']);
			$requete = parent::$connexion->prepare('SELECT * FROM produit WHERE libelle LIKE "%'.$barreRecherche.'%"');
			$requete->execute();
			$resultat = $requete->fetchAll();

			return $resultat;
		}
	}
}

?>
