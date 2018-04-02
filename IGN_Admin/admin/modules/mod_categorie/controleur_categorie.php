<?php


class ControleurCategorie extends ControleurGenerique{

	function __construct(){
		$this->modele = new ModeleCategorie();
		$this->vue = new VueCategorie();

	}

	function getModele(){
		return $this->modele;
	}

	function getVue(){
		return $this->vue;
	}


	function add_categorie(){
		$nom_categorie = htmlspecialchars($_POST['nom_categorie']);
		$this -> modele -> ajout_categorie($nom_categorie);



	}


	function edit_categorie(){
				
		$nom_categorie = htmlspecialchars($_POST['nom_categorie']);
		$this -> modele -> modifier_categorie($nom_categorie);

	}

	function del_categorie(){
		$this -> modele -> suppr_categorie();
	}

	function affiche_vue(){
		if (isset($_GET['add'])) {
			$this -> vue -> vue_ajout_categorie();

		}else if(isset($_GET['list'])){

			$listecategorie = $this->modele->parcours_categorie();

			$this -> vue -> affiche_modif_categorie($listecategorie);

		}else if (isset($_GET['edit'])) {
			$this -> vue-> vue_edit_categorie();

		}else if (isset($_GET['del'])) {

			$this -> modele -> suppr_categorie();
			?><script>alert("Votre categorie a bien était supprimer");</script><?php

		}





	}

}


?>
