<?php session_start(); ?>
<?php
if (isset($_SESSION['admin'])) {
	// Verifie si l'utilisateur connecté à les droits admin
	if ($_SESSION['admin'] == 1) {
		require_once('include/controleur_generique.php');
		require_once('include/modele_generique.php');
		require_once('include/module_generique.php');
		require_once('include/vue_generique.php');


		ModeleGenerique::init();

		$nom_module = isset($_GET['module']) ? $_GET['module'] : "accueil";
	//$nom_module = isset($_SESSION['id_user']) ? $nom_module : "inscription";

		foreach (glob("modules/mod_".$nom_module."/*.php") as $filename) {
			require_once($filename);
		}


		$module;
		switch($nom_module){
			case "accueil":
			$module = new ModAccueil();
			break;
			case "produit":
			$module = new ModProduit();
			break;
			case "categorie":
			$module = new ModCategorie();
			break;
			case "site":
			$module = new ModSite();
			break;
			default:
			$module = new ModAccueil();
			break;
		}
		$module->getControleur()->getVue()->tamponVersContenu();
		include('template.php');
	}
}else{
	echo "Vous n'avez pas les droits admin !";
}
?>

