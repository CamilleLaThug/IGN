<?php

	
require_once('./include/vue_generique.php');

class VueSite extends VueGenerique{


	function affiche_erreur($mess){
		$this->message = $mess;

		echo $this->message;

	}

	function vue_site(){
		?>

		<h1 class="titre1">Bonjour <?= $_SESSION['prenom'] ?></h1>
		
		<div class="formulaire">
			
				
				<label class="labelForm">Nom : <?= $_SESSION['nom'] ?></label> <br>
				
				<label class="labelForm">Prenom : <?= $_SESSION['prenom'] ?></label> <br>
			
				
				<hr>

			<br><br>
	

		</div>
			


		<?php

	}


}



?>
