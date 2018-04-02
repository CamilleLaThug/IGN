<?php

require_once('C:\wamp64\www\site\siteWeb\include\vue_generique.php');

class VuebarreRecherche extends VueGenerique{


	function affiche_erreur($mess){
		$this->message = $mess;

		echo $this->message;

	}

	function formulaire_barreRecherche($tab){
		while($rows = PDO_FETCH_ASSOC($tab)){
			echo "<li><a href='#'>".$rows['libelle']."</a></li>";
		}
	}

	function affiche_Recherche($tab){
		?>
		<div class="container">
			<h1 class="titre1">Resultat de la recherche</h1>
			<div class=" row text-center">
				<?php 
				foreach($tab as $resultat){
					?>	
					<div class="col-lg-4 col-md-6 mb-4">

						<div class="card">
							<img class="min_img" src="..\img\<?= $resultat["img"]?>" alt="">
							<div class="card-body">
								<h4 class="card-title"><?= $resultat["libelle"]?></h4>
								<p class="card-text"><?= $resultat["prix_ttc"]?> €</p>

							</div>

							<div class="card-footer">
								<a href="index.php?module=produit&id=<?= $resultat["id_produit"]?>" class="btn btn-primary">Voir Produit</a>
							</div>
						</div>
						
					</div>
					<?php 
				}
				?>
			</div>
		</div>

		<?php 

	}


}



?>
