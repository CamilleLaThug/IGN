<?php

require_once('./include/vue_generique.php');

class VueInscription extends VueGenerique{


	function affiche_erreur($mess){
		$this->message = $mess;

		echo $this->message;

	}

	function formulaire_inscription(){
		?>

		<h1 class="titre1">Inscription</h1>

			

		<div class="formulaire">

			<form id="connexion" action="index.php?module=inscription&action=confirme" method="POST">
			
				<label class="labelForm">Votre Prenom :</label> <br>
				<input class="champ" type="text" placeholder="Marc" name="prenom"><br><br>

				<label class="labelForm">Votre Nom :</label> <br>
				<input class="champ" type="text" placeholder="Homps" name="nom"><br><br>
				
				<label class="labelForm">Adresse e-mail :</label> <br>
				<input class="champ" type="email" placeholder="marchomps@ecommerce.com" name="email"><br><br>
				
				<label class="labelForm">Mot de passe :</label> <br>
				<input class="champ"  type="Password" name="password"><br><br>
				
				<label class="labelForm">Confirmez votre Mot de passe :</label> <br>
				<input class="champ"  type="Password" name="password_verif"><br><br>
				
				<input class="champ button identification" type="submit" name="creation" value="Créer votre compte maintenant"><br><br>



				<hr>

				<h4 class="titre4">Déjà inscrit ?</h4>
				<a class="menu_droite" href="index.php?module=connexion">Connectez vous</a>
				<br><br>



			</form>
		</div>

			


		<?php

	}


}



?>
