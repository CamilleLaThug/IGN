<?php session_start(); ?>
<?php
  
  require_once('include/controleur_generique.php');
  require_once('include/modele_generique.php');
  require_once('include/module_generique.php');
  require_once('include/vue_generique.php');


  ModeleGenerique::init();

  $nom_module = isset($_GET['module']) ? $_GET['module'] : "connexion";
  //$nom_module = isset($_SESSION['id_user']) ? $nom_module : "inscription";

  foreach (glob("modules/mod_".$nom_module."/*.php") as $filename) {
    require_once($filename);
  }


  $module;
    switch($nom_module){
      case "accueil":
        $module = new ModAccueil();
        break;
      case "connexion":
        $module = new ModConnexion();
        break;
      case "xlsread":
        $module = new ModXls();
        break;
      case "admin":
        $module = new ModAdmin();
        break;
      default:
        $module = new ModConnexion();
      break;
    }
    $module->getControleur()->getVue()->tamponVersContenu();
    include('template.php');
?>

