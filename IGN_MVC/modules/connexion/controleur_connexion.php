<?php

require_once("modules/connexion/modele_connexion.php");
require_once("modules/connexion/vue_connexion.php");


class ControleurConnexion extends ControleurGenerique {
	function __construct(){
		$this->modele = new ModeleConnexion();
		$this->vue = new VueConnexion();
	}

	function form_connexion(){
		$this->vue->vue_form_connexion();
	}

	function authentification(){
		$nom = $_POST['nom'];
		$password = $_POST['password'];

		$this->modele->modele_authentification($nom, $password);
	}

	function deconnexion(){
		?>

	A trés bientot <?php echo $_SESSION['nom'];?> la Team Scorpion


		<?php

		unset($_SESSION['nom']);
		unset($_SESSION['idMembre']);
	}
}
?>
