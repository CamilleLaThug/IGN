<?php

require_once('./include/vue_generique.php');

class VueConnexion extends VueGenerique{


	function affiche_erreur($mess){
		$this->message = $mess;

		echo $this->message;

	}

	function formulaire_connexion(){
		?>

    <p> <img src="images/logo.png" alt="" id="logo"> </p>

    <!--formulaire de connexion -->

    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <form method="POST" action="index.php?module=connexion&action=confirme" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
            <span class="login100-form-title">
              Connexion
            </span>

            <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
              <input class="input100" type="text" name="username" placeholder="Nom">
              <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "Please enter password">
              <input class="input100" type="password" name="pass" placeholder="Mot de passe">
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
  <?php
}
}
?>
