<?php


class ModeleGenerique {
	private static $dns = "mysql:host=localhost;dbname=ign";
	private static $user = "root";
	private static $password = "";
	protected static $connexion;


	static function init(){
		self::$connexion = new PDO (self::$dns, self::$user, self::$password);
	}

}
?>
