
<?php

class ModeleProduit extends ModeleGenerique{


	function listeProduit(){
		$requete =parent::$connexion->prepare('SELECT * FROM produit');
		$requete->execute();
		return $requete->fetchAll();
		
	}
	
	function afficheProduit(){
		if(isset($_GET['id'])){
			$requete = parent::$connexion->prepare('SELECT * FROM produit WHERE id_produit = :ref');
			$requete->execute(array(
				'ref' => $_GET['id']));
			return $requete->fetch();
		}
	}


	function listeCategorie(){
		$requete = "SELECT * from categorie";
		$reqPrep = parent::$connexion -> prepare($requete);
		$reqPrep -> execute();
		return $reqPrep->fetchAll();
	}

	function selectionParCategorie(){
		if(isset($_GET['categorie'])){
			$requete = parent::$connexion->prepare('SELECT * FROM categorie INNER JOIN produit ON categorie.id_categorie = produit.id_categorie WHERE categorie.id_categorie =:id');
			$requete->execute(array(
				'id' => $_GET['categorie']));

			return $requete->fetchAll();
		}
	}

	function ajouterArticle($libelle,$quantite,$prix){
		require_once('../siteWeb/modules/mod_panier/modele_panier.php');
		$modele_panier = new ModelePanier();
      //Si le panier existe
		if ($modele_panier->creationPanier() && $modele_panier->isVerrouille()){
         //Si le produit existe déjà on ajoute seulement la quantité
         	$positionProduit = array_search($_GET['id_produit'], $_SESSION['panier']['id_produit']);			

			if(isset($_GET['id_produit'])){
				if(is_numeric($positionProduit) && $_GET['id_produit'] == $_SESSION['panier']['id_produit'][$positionProduit]){
					$_SESSION['panier']['quantiteProd'][$positionProduit] += $quantite;
				}else{
            //Sinon on ajoute le produit
					array_push($_SESSION['panier']['id_produit'],$_GET['id_produit']);
					array_push($_SESSION['panier']['libelle'],$libelle);
					array_push($_SESSION['panier']['quantiteProd'],$quantite);
					array_push($_SESSION['panier']['prixProd'],$prix);
				}
			}
		}
		else
			echo "Un problème est survenu veuillez contacter l'administrateur du site.";
	}

	function getCommentaire(){
		if(isset($_GET['id'])){
			$requete = parent::$connexion->prepare('SELECT commentaire, date_commentaire, nom, prenom FROM commentaire inner join utilisateur on commentaire.id_utilisateur = utilisateur.id_utilisateur WHERE id_produit = :ref');
			$requete->execute(array(
				'ref' => $_GET['id']));
			$getLibelle = $requete->fetchAll();
			return $getLibelle;
		}	
	}

	function getLibelle(){
		if(isset($_GET['id_produit'])){
			$requete = parent::$connexion->prepare('SELECT libelle FROM produit WHERE id_produit = :ref');
			$requete->execute(array(
				'ref' => $_GET['id_produit']));
			$getLibelle = $requete->fetch();
			return $getLibelle['libelle'];
			
		}	
	}

	function getPrix(){
		if(isset($_GET['id_produit'])){
			$requete = parent::$connexion->prepare('SELECT prix_ttc FROM produit WHERE id_produit = :ref');
			$requete->execute(array(
				'ref' => $_GET['id_produit']));
			$getPrix = $requete->fetch();
			return $getPrix['prix_ttc'];
		}
	}
}
?>
