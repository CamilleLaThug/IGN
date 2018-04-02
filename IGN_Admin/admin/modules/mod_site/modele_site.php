<?php
class ModeleSite extends ModeleGenerique{





		function modifier_site($nom,$mail,$tel){
			$requete = 'UPDATE site SET  nom_du_site = :nom, numero_de_tel = :tel, email_du_site = :email WHERE id_site = 1';
			$reqPrep = parent::$connexion -> prepare($requete);
			$reqPrep -> execute(array(
				'nom'=>$nom,
				'tel'=>$tel,
				'email' => $mail
			));

		}




		function parcours_site(){
			$requete =parent::$connexion->prepare('SELECT * FROM site');
			$requete->execute();
			return $requete->fetchAll();
		}
}
?>
