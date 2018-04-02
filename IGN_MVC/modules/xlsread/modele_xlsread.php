<?php

class ModeleXlsread extends ModeleGenerique{

    function getNomEntreprises(){
      $red = self::$connexion->prepare("SELECT Nom FROM entreprises");
      $red->execute(array());
      $info = $red->FETCHALL(PDO::FETCH_ASSOC);
      return $info;
    }

}
