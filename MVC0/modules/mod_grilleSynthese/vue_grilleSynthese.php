<?php

require_once('include/vue_generique.php');

class VueGrilleSynthese extends VueGenerique {

	function __construct(){
		parent::__construct();
	}

	function vue_form_grilleSynthese() {
		?>
		<div class="container" >

	      <form class="form-signin" action = "index.php?module=connexion&action=authentification" method="POST">
	        <h2 class="form-signin-heading">Connectez-vous</h2>

	        <div>
		        <label for="inputPseudo" class="sr-only">Pseudo</label>
		        <input type="text" id="pseudo" class="form-control" name="pseudo" placeholder="Pseudo" required autofocus>
		    </div>

		    <div>
		        <label for="inputPassword" class="sr-only">Mot de passe</label>
		        <input type="password" id="inputPassword" class="form-control" name="mdp" placeholder="Mot de passe" required>
		    </div>

		    
	        <div class="checkbox">
	          <label>
	            <input type="checkbox" value="remember-me"> Se souvenir de moi ?
	          </label>
	        </div>
	        <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
	      </form>

	    </div> 

		<?php
	}
}


?>