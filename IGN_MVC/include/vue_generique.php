<?php


class VueGenerique {
	protected $titre;
	protected $contenu;

	public function __construct(){
		$this->contenu = "";
		$this->titre = "";
		ob_start();
	}

	public function getTitre() {
		return $this->titre;
	}

	public function getContenu() {
		return $this->contenu;
	}

	public function tamponVersContenu() {
		$this->contenu .= ob_get_clean();
	}

	public function vue_erreur($error){

				echo "<script>alert('$error');</script>";

	}


	public function vue_confirm($confirm){
		echo "<script>alert('$error');</script>";
	}
}

?>
