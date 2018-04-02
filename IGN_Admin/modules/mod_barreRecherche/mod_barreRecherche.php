<?php
require_once('C:\wamp64\www\site\siteWeb\include\module_generique.php');
require_once('controleur_barreRecherche.php');

class ModbarreRecherche extends ModuleGenerique{

	private $ca;
	
	function __construct(){
		$this->controleur = new ControleurbarreRecherche();

		if(isset($_GET['action'])){
			$action = $_GET['action'];
		}else{
			$action = "default";
		}
		$this->action($action);
	}

	function action($action){
		switch ($action) {
			case 'confirme':
				$this->controleur->barreRecherche();
				break;
		}
	}
}

?>