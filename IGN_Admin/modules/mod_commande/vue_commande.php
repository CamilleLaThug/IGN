<?php

	
require_once('./include/vue_generique.php');

class VueCommande extends VueGenerique{


	function affiche_erreur($mess){
		$this->message = $mess;

		echo $this->message;

	}
	
	function vue_commande(){
		?>
		<h1 class="titre1">Bonjour <?= $_SESSION['prenom'] ?></h1>
		<div class="formulaire">
				<label class="labelForm">Nom : <?= $_SESSION['nom'] ?></label><br/>
				<label class="labelForm">Prenom : <?= $_SESSION['prenom'] ?></label><br/>
				<a href="index.php?module=commande&action=modifier" class="btn btn-primary">Modifier</a>
				<hr>
			<br/><br/>
		</div>
		<?php
	}

	function vue_commande_modifier(){
		?>
		<h1 class="titre1">Modification de votre commande</h1>
		<div class="formulaire">
			<form id="commentaire" action="index.php?module=commande&action=valider" method="POST">
				<label class="labelForm">Nom : <input type="text" name="nom" value="<?=$_SESSION['nom']?>"><br/>
				<label class="labelForm">Prenom : <input type="text" name="prenom" value="<?=$_SESSION['prenom']?>"></label><br/>
				<input class="identification button champ"  type="submit" value="Valider"><br\><br\>
				<hr>
			<br/><br/>
		</div>
		<?php
	}
}
?>
