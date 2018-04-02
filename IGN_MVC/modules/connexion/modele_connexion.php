<?php

class ModeleConnexion extends ModeleGenerique{

    function modele_authentification($nom, $password) {
   		$requete = "SELECT idMembre, nom, password from membre where nom = :nom AND password = :pass";
   		$reqPrep = self::$connexion->prepare($requete);
   		$reqPrep->execute (array(
        'nom' => $nom,
        'pass' => $password));
   		$res = $reqPrep->fetch();

      if(!$res){
        echo "impossible de se connecter";
      }else{
        header('Location:index.php?module=xlsread&action=afficheXls');
      }

    }

}
