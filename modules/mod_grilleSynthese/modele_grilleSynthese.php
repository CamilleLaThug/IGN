<?php

require_once('include/modele_generique.php');

class ModeleGrilleSynthese extends ModeleGenerique {
	
	function modele_info_entreprise($id_projet) {


			$req = 'select id_startup, titre_projet from startup inner join projet using (id_projet) where id_projet=?';
			$prepare = self::$connexion->prepare($req);
			$prepare->execute (array($pseudo));
			$result = $prepare->fetch();
			
			if( password_verify($mdp, $result['mdp_user'])) {

				return $result['id_user'];

			} else {
				return NULL;
			}

		
	}
}
//select id_startup, titre_projet from startup inner join projet using (id_projet) where id_projet=1;
?>
