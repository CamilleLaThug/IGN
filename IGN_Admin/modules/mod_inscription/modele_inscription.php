<?php

class ModeleInscription extends ModeleGenerique{
	/*
	function getMessage(){
		$requete = "SELECT nom FROM genres";
		$reqPrep = parent::$connexion->prepare($requete);
		$reqPrep->execute();
		return $reqPrep;
	}*/

	function ajout_utilisateur($nom,$prenom,$mail,$mdp){
		$requete = "INSERT INTO utilisateur(nom,prenom,email,password,estAdmin) VALUES (?,?,?,?,?)";
		$reqPrep = parent::$connexion -> prepare($requete);
		$reqPrep -> execute(array($nom,$prenom,$mail,$mdp,0));
	}


	function compteExistant($mail){
		$sql = 'SELECT COUNT(email) FROM utilisateur WHERE email="'.$mail.'"';
	    $result = parent::$connexion -> prepare($sql);
		$result->execute(); 
		$nombre_resultat = $result->fetchColumn(); 
	    
   	    if($nombre_resultat >= 1){
	    	return true;
	    }else{
	    	return false;
	    }
	}
}
?>