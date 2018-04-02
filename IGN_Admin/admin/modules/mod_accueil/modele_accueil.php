<?php
class ModeleAccueil extends ModeleGenerique{


	function nbr_Produit(){

	    $sql = 'SELECT COUNT(*) AS nombre FROM produit';
	    $result = parent::$connexion->query($sql);
	    $columns = $result->fetch();
	    $nb = $columns['nombre'];
	    return $nb;
	}

}
?>
