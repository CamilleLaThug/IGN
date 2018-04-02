<?php

class ModelePanier extends ModeleGenerique{

   function creationPanier(){
      if(!isset($_SESSION['panier'])){
         $_SESSION['panier'] = array();
         $_SESSION['panier']['id_produit'] = array();
         $_SESSION['panier']['libelle'] = array();
         $_SESSION['panier']['quantiteProd'] = array();
         $_SESSION['panier']['prixProd'] = array();
         $_SESSION['panier']['verrou'] = false;
      }
      return true;
   }


   function supprimerArticle($libelleProduit){
   //Si le panier existe
      if ($this->creationPanier() && $this->isVerrouille()){
      //Nous allons passer par un panier temporaire
         $tmp = array();
         $tmp['libelle'] = array();
         $tmp['quantiteProd'] = array();
         $tmp['prixProd'] = array();
         $tmp['verrou'] = $_SESSION['panier']['verrou'];

         for($i = 0; $i < count($_SESSION['panier']['libelle']); $i++){
            if ($_SESSION['panier']['libelle'][$i] !== $libelleProduit){
               array_push( $tmp['libelle'],$_SESSION['panier']['libelle'][$i]);
               array_push( $tmp['quantiteProd'],$_SESSION['panier']['quantiteProd'][$i]);
               array_push( $tmp['prixProd'],$_SESSION['panier']['prixProd'][$i]);
            }
         }
      //On remplace le panier en session par notre panier temporaire à jour
         $_SESSION['panier'] = $tmp;
      //On efface notre panier temporaire
         unset($tmp);
      }
      else
         echo "Un problème est survenu veuillez contacter l'administrateur du site.";
   }

   function isVerrouille(){
      if (isset($_SESSION['panier']) && $_SESSION['panier']){
         return true;
      }
      else{
         return false;
      }
   }

   function MontantGlobal(){
      $total=0;
      for($i = 0; $i < count($_SESSION['panier']['libelle']); $i++)
      {
         $total += $_SESSION['panier']['quantiteProd'][$i] * $_SESSION['panier']['prixProd'][$i];
      }
      return $total;
   }

   function supprimePanier(){
      unset($_SESSION['panier']);
      $this->creationPanier();
   }
}

?>