<?php

class ControleurGenerique{

	protected $module;
	protected $vue;

	function __construct(){
		$this->vue= new VueGenerique();
		//$this->module= new ModuleGenerique();
	}

	function getVue() {
		return $this->vue;
	}


}

?>