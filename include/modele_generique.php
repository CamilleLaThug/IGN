<?php
class ModeleGenerique{
	private static $dns = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201618; charset=utf8";
	private static $user= "dutinfopw201618";
	private static $password= "hytytesa";
	protected static $connexion; 

	 static function init(){
		self::$connexion=new PDO(self::$dns, self::$user, self::$password);
		
	}


	function creer_token($validite = "300") {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$charactersLength = strlen($characters);
    	$randomString = '';
    	for ($i = 0; $i < 20; $i++) {
        	$randomString .= $characters[rand(0, $charactersLength - 1)];
    	}

		$requete = "INSERT INTO p_token (id_token, date_token, tps_token) VALUES (?, NOW(), ?)";
   		$reqPrep = self::$connexion->prepare($requete);
   		$reqPrep->execute(array($randomString, $validite));
     	$reqPrep->fetch();
     	return $randomString;
	}

	function get_token($token) {
		$requete = "SELECT id_token FROM p_token WHERE id_token = ?";
   		$reqPrep = self::$connexion->prepare($requete);
   		$reqPrep->execute(array($token));
   		$res = $reqPrep->fetch();
   		$this->effaceToken($token);
   		return $res['idToken'];
	}

	function efface_token($token) {
		$requete = "DELETE FROM p_token WHERE id_token = ?";
   		$reqPrep = self::$connexion->prepare($requete);
   		$this->effaceTokenNonValides();
   		return $reqPrep->execute(array($token));
	}

	function efface_token_non_valides() {
		$requete = "DELETE FROM p_token WHERE DATE_ADD(date_token,INTERVAL tps_token SECOND) < NOW()";
   		$reqPrep = self::$connexion->prepare($requete);
   		return $reqPrep->execute();
	}

}

?>