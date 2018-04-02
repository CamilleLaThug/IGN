<?php
class ControleurGenerique{
	protected $modele;
	protected $vue;

	function __construct(){
		$this->vue = new VueGenerique();
		$this->modele = new ModeleGenerique();
	}

	function getVue(){
		return $this->vue;
	}
	
}



?>
