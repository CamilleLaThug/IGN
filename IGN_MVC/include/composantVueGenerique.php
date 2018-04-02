<?php

class ComposantVueGenerique
{
    protected $contenu;

    public function __construct() {
        $this->contenu="";
    }

    public function errorMessage ($error, $message)
    {
        $this->contenu .= "<p>$error:  $message </p>";

    }


    public function confirmMessage ($message)
    {
        $this->contenu .= "<p>$message</p>";
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getContenu() {
        return $this->contenu;
    }
}
