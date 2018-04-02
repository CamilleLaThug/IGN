<?php
class ModeleGenerique{
	private static $dns = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201650;charset=utf8";
	private static $user = "dutinfopw201650";
	private static $password = "zugetene";

	protected static $connexion;

	static function init(){
		self::$connexion = new PDO (self::$dns, self::$user, self::$password);
	}


}



?>