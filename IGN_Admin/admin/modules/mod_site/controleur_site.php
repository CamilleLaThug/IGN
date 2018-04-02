<?php


class ControleurSite extends ControleurGenerique{

	function __construct(){
		$this->modele = new ModeleSite();
		$this->vue = new VueSite();

	}

	function getModele(){
		return $this->modele;
	}

	function getVue(){
		return $this->vue;
	}




	function edit_site(){
				
		$nom_site = htmlspecialchars($_POST['nom_site']);
		$email_site = htmlspecialchars($_POST['email_site']);
		$tel_site = htmlspecialchars($_POST['tel_site']);

		$this -> modele -> modifier_site($nom_site,$email_site,$tel_site);

	}

	

	function affiche_vue(){
		if (isset($_GET['list'])) {
			$donneeSite = $this->modele->parcours_site();
			$this->vue->vue_global($donneeSite);
		}


		if (isset($_GET['edit'])) {
			$this -> vue -> vue_edit_site();
		}




	}

}


?>
