<?php

class ModeleCommande extends ModeleGenerique{
	/*
	function getMessage(){
		$requete = "SELECT nom FROM genres";
		$reqPrep = parent::$commande->prepare($requete);
		$reqPrep->execute();
		return $reqPrep;
	}*/

	function modele_commande_modifier($nom, $prenom, $idutilisateur){
		$requete = "UPDATE utilisateur SET nom=?, prenom=? where id_utilisateur=?";
		$reqPrep = parent::$connexion->prepare($requete);
		$reqPrep->execute(array($nom,$prenom,$idutilisateur));
		$_SESSION['nom'] = $nom;
		$_SESSION['prenom'] = $prenom;
	}
}
?>