<?php

class VueConnexion extends VueGenerique {
	function __construct(){
		parent::__construct();
		$this->titre = "Conn";
	}

	function vue_form_connexion() {
		?>
			<!DOCTYPE html>
			<html>
			<head>
			<link rel="stylesheet" href="modules/connexion/index.css">
			<script src="modules/connexion/script.js" charset="utf-8"></script>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<!--===============================================================================================-->
			<link rel="icon" type="image/png" href="modules/connexion/images/icons/favicon.ico"/>
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="modules/connexion/vendor/bootstrap/css/bootstrap.min.css">
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="modules/connexion/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="modules/connexion/vendor/animate/animate.css">
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="modules/connexion/vendor/css-hamburgers/hamburgers.min.css">
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="modules/connexion/vendor/animsition/css/animsition.min.css">
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="modules/connexion/vendor/select2/select2.min.css">
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="modules/connexion/vendor/daterangepicker/daterangepicker.css">
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="modules/connexion/css/util.css">
			<link rel="stylesheet" type="text/css" href="modules/connexion/css/main.css">

			<!--===============================================================================================-->
				<script src="modules/connexion/vendor/jquery/jquery-3.2.1.min.js"></script>
			<!--===============================================================================================-->
				<script src="modules/connexion/vendor/animsition/js/animsition.min.js"></script>
			<!--===============================================================================================-->
				<script src="modules/connexion/vendor/bootstrap/js/popper.js"></script>
				<script src="modules/connexion/vendor/bootstrap/js/bootstrap.min.js"></script>
			<!--===============================================================================================-->
				<script src="modules/connexion/vendor/select2/select2.min.js"></script>
			<!--===============================================================================================-->
				<script src="modules/connexion/vendor/daterangepicker/moment.min.js"></script>
				<script src="modules/connexion/vendor/daterangepicker/daterangepicker.js"></script>
			<!--===============================================================================================-->
				<script src="modules/connexion/vendor/countdowntime/countdowntime.js"></script>
			<!--===============================================================================================-->
				<script src="modules/connexion/js/main.js"></script>

				<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
			</head>
			<body>

			<header>
				<nav>
					<form method="get" action="/search" id="search">
							<input name="q" type="text" size="40" placeholder="Rechercher..." />
					</form>
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
				</nav>
			</header>

			<p> <img src="modules/connexion/image/logo.png" alt="" id="logo"> </p>

			<!--formulaire de connexion -->

			<div class="limiter">
				<div class="container-login100">
					<div class="wrap-login100">
				 <form action="index.php?module=connexion&action=authentification" method="POST" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
							<span class="login100-form-title">
								Connexion
							</span>

							<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
								<input class="input100" type="text" name="nom" placeholder="Nom">
								<span class="focus-input100"></span>
							</div>

							<div class="wrap-input100 validate-input" data-validate = "Please enter password">
								<input class="input100" type="password" name="password" placeholder="Mot de passe">
								<span class="focus-input100"></span>
							</div>

							<div class="text-right p-t-13 p-b-23">
								<span class="txt1">
									Avez-vous oublié votre
								</span>

								<a href="#" class="txt2">
									 Nom / Mot de passe ?
								</a>
							</div>

							<div class="container-login100-form-btn">
								<button class="login100-form-btn">
									Connexion
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
				<button onclick="topFunction()" id="myBtn" title="vers le haut"> <img src="modules/connexion/image/top.png" alt=""> </button>
			</body>
			</html>

		<?php
	}



}
?>
