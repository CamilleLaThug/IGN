<?php
require_once("modules/xlsread/vue_xlsread.php");
require_once("include/modele_generique.php");
require_once("modules/xlsread/modele_xlsread.php");


class ControleurXlsread extends ControleurGenerique {
	function __construct(){
		$this ->vue = new VueXlsread();
		$this->modele = new ModeleXlsread();
	}

	function  afficheXls(){
		if (!$informa = $this->modele->getNomEntreprises()) {
			$this->vue->vue_erreur("impossible de recup les information");
		}
	$this ->vue->afficheXls($informa);
	}

}
?>
