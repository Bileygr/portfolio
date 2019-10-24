<?php
class Connect{
	public function connexion(){
		$bdd = parse_ini_file("bdd.ini", true);
		try{
			$db = new PDO("mysql:host=".$bdd["hote"].";port=".$bdd["port"].";dbname=".$bdd["bdd"].";charset=utf8", $bdd["utilisateur"], $bdd["mot_de_passe"]);
		}catch(Exception $e){
			echo "Échec lors de la connexion: ".$e->getMessage();
		}
		return $db;
	}
}
?>