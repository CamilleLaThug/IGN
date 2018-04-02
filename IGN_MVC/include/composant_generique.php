<?php
class ComposantGenerique {
	protected $controleur;

        public function __construct() {
            $this->controleur = new ControleurGenerique();
            $this->controleur->erreur ("Pas de Module");
        }

	public function getTitre()
	{
		//return $this->controleur->titre;
	}

  public function getControleur() {

            return $this->controleur;
        }
}
