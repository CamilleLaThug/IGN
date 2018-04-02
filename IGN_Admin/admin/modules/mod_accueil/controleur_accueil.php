<?php


class ControleurAccueil extends ControleurGenerique{

	function __construct(){
		$this->modele = new ModeleAccueil();
		$this->vue = new VueAccueil();

	}

	function getModele(){
		return $this->modele;
	}

	function getVue(){
		return $this->vue;
	}

	function affiche_vue(){
		
		$nbrProduit = $this->modele->nbr_Produit();
		$this->vue->affiche($nbrProduit);
	}



}


?>
