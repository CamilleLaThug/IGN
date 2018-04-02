<?php


class ControleurProduit extends ControleurGenerique{

	function __construct(){
		$this->modele = new ModeleProduit();
		$this->vue = new VueProduit();

	}

	function getModele(){
		return $this->modele;
	}

	function getVue(){
		return $this->vue;
	}


	function add_produit(){
		$nom_util = htmlspecialchars($_POST['nom_utilisateur']);
		$pass_util = htmlspecialchars($_POST['pass_utilisateur']);
		$mail_util = htmlspecialchars($_POST['mail_utilisateur']);

		var_dump($nom_util);

		$this -> modele -> ajout_produit($nom_util, $pass_util, $mail_util);
		?><script>alert("Votre Produit a bien était ajouter");</script><?php
	}


	function edit_produit(){
		$nom_produit = htmlspecialchars($_POST['nom_produit']);
		$ref_produit = htmlspecialchars($_POST['ref_produit']);
		$prix_produit = htmlspecialchars($_POST['prix_produit']);
		$description_produit = htmlspecialchars($_POST['description_produit']);
		$img_produit = htmlspecialchars($_POST['img_produit']);
		$cat_produit = htmlspecialchars($_POST['cat_produit']);

		$this -> modele -> modifier_produit($nom_produit,$ref_produit,$prix_produit,$description_produit,$img_produit,$cat_produit);
	}


	function affiche_vue(){
		if (isset($_GET['add'])) {
			$listeCategorie = $this->modele->liste_categorie();
			$this -> vue -> vue_ajout_produit($listeCategorie);

		}else if(isset($_GET['list'])){

			$listeProduit = $this->modele->parcours_utilisateur();
			$this -> vue -> affiche_Utilisateur($listeProduit);

		}else if (isset($_GET['edit'])) {
			$listeCategorie = $this->modele->liste_categorie();
			$produit = $this->modele->parcours_un_produit($_GET['edit']);
			$this -> vue-> vue_edit_produit($listeCategorie,$produit);

		}else if (isset($_GET['del'])) {

			$this -> modele -> suppr_produit();
			header('Location: index.php?module=produit&list');


		}





	}

}


?>
