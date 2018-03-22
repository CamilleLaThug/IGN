<?php

require_once('include/vue_generique.php');

class VueGrilleSynthese extends VueGenerique {

	function __construct(){
		parent::__construct();
	}
	function vue_form_grilleSynthese() {
		?>
		<body>
		<div class="container" >

	      <form class="form-signin" action = "index.php?module=grilleSynthese&action=info_entreprise" method="POST">
	        <h2 >Grille de synthèse</h2>
		    
	        <button type="submit">Ouvrir</button>
	      </form>
cfjbgvhbjhb
	    </div> 
</body>
		<?php
	}
}


?>