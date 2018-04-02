<?php
class ModeleCategorie extends ModeleGenerique{



		function ajout_categorie($nom){
			$requete = "INSERT INTO categorie(libelle) VALUES (?)";
			$reqPrep = parent::$connexion -> prepare($requete);
			$reqPrep -> execute(array($nom));
		}


		function modifier_categorie($nom){
			$requete = 'UPDATE categorie SET  libelle = :libelle WHERE id_categorie = :id_categorie';
			$reqPrep = parent::$connexion -> prepare($requete);
			$reqPrep -> execute(array(
				'libelle'=>$nom,
				'id_categorie'=> $_GET['id']
			));

		}

		function suppr_categorie(){
			$id = $_GET['del'];
			$requete = 'DELETE FROM categorie WHERE id_categorie = :id_categorie';
			$reqPrep = parent::$connexion -> prepare($requete);
			$reqPrep -> execute(array(
				'id_categorie'=> $id
			));


		}


		function parcours_categorie(){
			$requete =parent::$connexion->prepare('SELECT * FROM categorie');
			//$requete =parent::$connexion->prepare('SELECT * FROM categorie inner join categorie on categorie.id_categorie = categorie.id_categorie');

			$requete->execute();
			return $requete->fetchAll();
		}
}
?>
