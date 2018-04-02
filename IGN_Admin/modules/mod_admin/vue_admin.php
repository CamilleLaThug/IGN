<?php


require_once('./include/vue_generique.php');

class VueAdmin extends VueGenerique{


	function affiche_erreur($mess){
		$this->message = $mess;

		echo $this->message;

	}

	function admin_vue_global(){
        

        header('Location: ./admin/index.php');    



    }


}




?>
