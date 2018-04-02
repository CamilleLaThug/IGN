<?php
class ModeleAccueil extends ModeleGenerique{

	
	function dernierArticles(){

		$requete = "SELECT * from produit order by id_produit desc limit 3";
		$reqPrep = parent::$connexion -> prepare($requete);
		$reqPrep -> execute();

		return $reqPrep->fetchAll();

	}
}
?>
