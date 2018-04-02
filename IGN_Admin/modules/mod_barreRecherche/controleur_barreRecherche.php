<?php
require_once('vue_barreRecherche.php');
require_once('modele_barreRecherche.php');
require_once('C:\wamp64\www\site\siteWeb\include\controleur_generique.php');

class ControleurbarreRecherche extends ControleurGenerique{

		function __construct(){
			$this -> vue = new VuebarreRecherche();
			$this -> modele = new ModelebarreRecherche();
		}

		function form_barreRecherche(){
			$this->vue->formulaire_barreRecherche();
		}

		function barreRecherche(){	    
	        $resultatRecherche = $this->modele->model_barreRecherche();
			$this->vue->affiche_Recherche($resultatRecherche);
	    }

	function getModele(){
		return $this->modele;
	}

	function getVue(){
		return $this->vue;
	}


}
?>