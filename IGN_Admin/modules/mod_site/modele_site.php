<?php

class ModeleSite extends ModeleGenerique{
	
	function nom_site(){
	$requete = "SELECT nom_du_site from site where id_site=1";
		$reqPrep = parent::$connexion->prepare($requete);
		$reqPrep -> execute();
		return $reqPrep->fetch(); 
	}
}
?>
