<?php


class VueGenerique{
	protected $contenu;
	protected $titre;

	function __construct(){
		$this->contenu = "";
		$this->titre = "";
		//ob_start();	//temporise les affichages
	}


	function tamponVersContenu(){
		$this-> contenu = $this -> contenu.ob_get_clean();
	}


	function vue_erreur($msgerror){

		?> <div class="alert alert-danger">
				<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span><strong><?php echo $msgerror; ?></strong>
			</div>
		<?php	
	}


	function vue_confirm($msgconfirm){

		?> <div class="alert alert-success">
				<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span><strong><?php echo $msgconfirm; ?></strong>
			</div>
		<?php
	}

	
	function getTitre() {
		return $this->titre;
	}


	function getContenu() {
		return $this->contenu;
	}

}
?>