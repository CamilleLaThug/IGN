<?php
require_once('vue_panier.php');
require_once('modele_panier.php');
require_once('./include/controleur_generique.php');

class ControleurPanier extends ControleurGenerique{

	function __construct(){
		$this -> vue = new VuePanier();
		$this -> modele = new ModelePanier();
	}

	function panier_affiche(){
		if(!isset($_SESSSION['panier'])){
			$this->modele->creationPanier();
		}
		if (!isset($_SESSSION['panier'])) {
			$prixTotal = $this->modele->MontantGlobal();
			$this->vue->panier_vue_affiche($prixTotal);
		}
	}

	function panier_vider(){
		if(!isset($_SESSSION['panier'])){
			$this->modele->supprimePanier();
		}
	}

	function panier_supprimerArticle(){
		$this->modele->supprimerArticle("iPhone 7 Noir Mat");
	}

	
	function getModele(){
		return $this->modele;
	}

	function getVue(){
		return $this->vue;
	}

}


?>
