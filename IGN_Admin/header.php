<header>
	<nav>
		<div id="myNav" class="overlay">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img src="modules/connexion/image/close.png"></a>
			<div class="overlay-content">
				<a href="#" class="lien">A Propos</a>
				<a href="#" class="lien">Services</a>
				<a href="#" class="lien">PARTENAIRES</a>
				<a href="#" class="lien">Contact</a>
			</div>
		</div>
		<span onclick="openNav()" class="span">&#9776;</span>
		<?php
		if(isset($_SESSION['admin'])){
			if($_SESSION['admin']==1){
				?>
				<a href="index.php?module=admin" style="float: right;"> Admin</a>
				<?php
			}
		}
		?>
		<?php 
		if (isset($_SESSION['id']) AND isset($_SESSION['nom'])) {
			?>
			<a href="deconnexion.php" style="float: right; margin-right: 10px;" >Deconnexion</a>
			<?php 
		}
		?>
	</nav>
</header>
