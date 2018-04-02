<?php


require_once('./include/vue_generique.php');

class VueProduit extends VueGenerique{


	function affiche_erreur($mess){
		$this->message = $mess;

		echo $this->message;

	}


	function produit_vue_categorie($tab){
		?>
		<h1 class="titre1">Liste Produits</h1>
		<br><br>
		<div class="container">
			<?php $this->afficheCategorie_vue($tab);?>
			<div class=" row text-center">
				<?php 
			}

			function produit_vue_affiche($tab, $tabCommentaire){
				if(isset($_GET['id'])){
					$this->afficheProduit_vue($tab, $tabCommentaire);
				}
			}

			function categorie_vue_affiche($tab){
				if(isset($_GET['categorie'])){
					$this->produit_vue_global($tab);

				}
			}


			function produit_vue_global($tab){
				foreach($tab as $resultat){
					?>
					<div class="col-lg-4 col-md-6 mb-4">
						<div class="card">
							<img class="min_img" src="..\img\<?= $resultat["img"]?>" alt="">
							<div class="card-body">
								<h4 class="card-title"><?php echo $resultat["libelle"];?></h4>
								<p class="card-text"><?php echo $resultat["prix_ttc"];?> €</p>

							</div>
							<div class="card-footer">
								<a href="index.php?module=produit&id=<?=$resultat["id_produit"] ?>" class="btn btn-primary">Voir Produit</a>
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




	function afficheCategorie_vue($tab){
		?>
		<div class="col-lg-2">
			<div class="list-group">
				<a href="index.php?module=produit" class="list-group-item">Tous les produits</a>

				<?php 
				foreach ($tab as $resultat) {
					?>
					<a href="index.php?module=produit&categorie=<?=$resultat['id_categorie']?>" class="list-group-item"><?php echo $resultat['libelle']; ?></a>
					<?php  
				}        
				?>
			</div>
		</div>
		<?php 
	}


	function afficheProduit_vue($tab_produit, $tabCommentaire){
		?>
		<div class="row">

			<div class="col-lg-3">
				<a class="my-4" href="index.php?module=produit">Retour Aux Produits</a>

			</div>
			<div class="col-lg-9">

				<div class="card">
					<div class="card-header">Détails : <?= $tab_produit["libelle"]?> </div>

					<img class="max_img" src="..\img\<?= $tab_produit["img"]?>" alt="">
					<div class="card-body">
						<h3 class="card-title"><?= $tab_produit['libelle'];?></h3>
						<h4><?= $tab_produit['prix_ttc']. " €";?></h4>
						<p class="card-text"><?= $tab_produit['description'];?></p>

						<a href="index.php?module=produit&action=ajout&id_produit=<?= $tab_produit['id_produit']?>" class="btn btn-primary">Ajouter au Panier</a>

					</div>
				</div>

			</div>

			<div class="col-lg-3"></div>

			<div class="col-lg-9 my-4">

				<div class="card">
					<div class="card-header">Commentaire </div>
					<div class="card-body">
						<?php 
						foreach ($tabCommentaire as $resultat) {
							?>
							<p><?=$resultat['commentaire'] ?></p>
							<small class="text-muted">Posté par <?=$resultat['prenom']." ".$resultat['nom'] ?> le 
							<?php  $date=date_create($resultat['date_commentaire']); echo date_format($date,"d-m-Y");?>
							à <?php echo date_format($date,"H").":".date_format($date,"i"); ?>
 	
 </small>
							<hr>
							<?php 
						}
						?>
						<a href="index.php?module=commentaire&id=<?= $_GET['id'] ?>"class="btn btn-success">Poster un commentaire</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 

?>



<?php 

}

}

?>
