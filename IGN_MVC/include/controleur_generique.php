<?php

	class ControleurGenerique{
	
		protected $modele;
		protected $vue;

		function getModele(){
			return $this->modele;
		}
		function getVue(){
			return $this->vue;
		}

	}

?>