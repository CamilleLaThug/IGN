<?php
require_once('vue_produit.php');
require_once('modele_produit.php');
require_once('./include/controleur_generique.php');

class ControleurProduit extends ControleurGenerique{

	function __construct(){
		$this -> vue = new VueProduit();
		$this -> modele = new ModeleProduit();
	}

	function form_produit(){
		$this -> vue -> formulaire_produit();
	}

	function produit(){
		$this -> modele -> listeProduit();	
	}


	function produit_affiche(){
		$listeproduit = $this->modele->listeProduit();
		$afficheProduit = $this->modele->afficheProduit();
		$afficheCategorie = $this->modele->listeCategorie();
		$afficheProduitCategorie = $this->modele->selectionParCategorie();
		$commentaire = $this->modele->getCommentaire();
		$this -> vue ->produit_vue_categorie($afficheCategorie);
		$this -> vue ->produit_vue_affiche($afficheProduit, $commentaire);
		$this -> vue ->categorie_vue_affiche($afficheProduitCategorie);
		if(!isset($_GET['id']) AND !isset($_GET['categorie'])){
			$this -> vue ->produit_vue_global($listeproduit);
		}
	}

	function produit_ajouter(){
		$libelleProduit = $this->modele->getLibelle();
		$prixProduit = $this->modele->getPrix();
		$this->modele->ajouterArticle($libelleProduit, 1, $prixProduit);
	}

	function categorie_affiche(){
		$this->vue->afficheCategorie_vue($this->modele->listeCategorie());
	}

	function getModele(){
		return $this->modele;
	}

	function getVue(){
		return $this->vue;
	}

}


?>
