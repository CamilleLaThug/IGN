<?php
class ModeleProduit extends ModeleGenerique{



		function ajout_produit($nom_util, $pass_util, $mail_util){
			$requete = "INSERT INTO membre(nom, password, email) VALUES (?,?,?)";
			$reqPrep = parent::$connexion -> prepare($requete);
			$reqPrep -> execute(array($nom_util, $pass_util, $mail_util));
		}


		function modifier_produit($nom,$ref,$prix,$descri,$img,$cat){
			$requete = 'UPDATE produit SET ref_produit = :ref, libelle = :libelle, prix_ttc = :prix, description = :descri, id_categorie = :id_cat, img = :img WHERE id_produit = :id_produit';
			$reqPrep = parent::$connexion -> prepare($requete);
			$reqPrep -> execute(array(
				'ref'=>$ref,
				'libelle'=>$nom,
				'prix'=>$prix,
				'descri'=>$descri,
				'id_cat'=>$cat,
				'img'=>$img,
				'id_produit'=> $_GET['id']
			));

		}

		function suppr_produit(){
			$id = $_GET['del'];
			$requete = 'DELETE FROM produit WHERE id_produit = :id_produit';
			$reqPrep = parent::$connexion -> prepare($requete);
			$reqPrep -> execute(array(
				'id_produit'=> $id
			));


		}

		function liste_categorie(){
			$requete =parent::$connexion->prepare('SELECT * FROM categorie');
			$requete->execute();
			return $requete->fetchAll();
		}


		function parcours_utilisateur(){
			//$requete =parent::$connexion->prepare('SELECT * FROM produit');
			$requete =parent::$connexion->prepare('SELECT idMembre, nom from membre');
			$requete->execute();
			return $requete->fetchAll();
		}


		function parcours_un_produit($id){
			$requete =parent::$connexion->prepare('SELECT * FROM produit WHERE id_produit = :id');
			$requete->execute(array('id'=> $id));
			return $requete->fetchAll();
		}
}
?>
