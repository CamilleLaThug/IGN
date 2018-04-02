<?php
	require_once("include/modele_generique.php");
	require_once("include/module_generique.php");
	require_once("include/controleur_generique.php");
	require_once("include/vue_generique.php");
	include_once("include/composant_generique.php");
	include_once("include/composantVueGenerique.php");

ModeleGenerique::init();

session_start();

if (!isset($_SESSION['idMembre']))
	$_SESSION['idMembre'] = "";

$module = isset($_GET['module']) ? $_GET['module'] : "connexion";
switch($module) {
	case "xlsread":
	case "connexion":
	include_once ("modules/$module/mod_$module.php");
	$nomModule = "Mod$module";
	$afficheModule = new $nomModule();
	$afficheModule->getControleur()->getVue()->tamponVersContenu();
	include "include/template.php";
			break;
    default :
			 header("Refresh:3;index.php?module=connexion");
			 // redirection vers "accueil.php" dans 3 secondes
			 ?>

					 <h1 id="titre_inter">Page Introuvable </h1>
					 <p id="para_inter">redirection vers la page d'accueil dans 3s</p>

			 <?php
										// affichage de la vue "intedit, vous allez être redirigé bla bla bla..."
    	$afficheModule = new ModuleGenerique();
}



?>
