<?php
class Connect{
	public function connexion(){
		$host = "127.0.0.1";
		$port = "";
		$db = "portfolio";
		$user = "root";
        $password = "";
        
		try{
			$db = new PDO("mysql:host=".$host.";port=".$port.";dbname=".$db.";charset=utf8", $user, $password);
		}catch(Exception $e){
			echo "Échec lors de la connexion: ".$e->getMessage();
		}
		return $db;
	}
}
?>