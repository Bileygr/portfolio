<?php
require "conf/Connect.php";
require "app/model/Message.php";
require "app/dao/CRUD.php";

class MessageDAO implements CRUD{
    public function create($message){
        $connect = new Connect();
		$connexion = $connect->connexion();
		$requete = $connexion->prepare("INSERT INTO message(nom, email, message, dateajout) VALUES(:nom, :email, :message, NOW())");
		$requete->execute(["nom"=>$message->getNom(), "email"=>$message->getEmail(), "message"=>$message->getMessage()]);
		$requete = null;
		$connexion = null;
    }

    public function read($champ, $valeur){
        $connect = new Connect();
        $connexion = $connect->connexion();
        $requete = null;
        
        switch ($champ){
            case "id":
                $requete = $connexion->prepare("SELECT * FROM message WHERE id = :id");
                $requete->execute(["id"=>$valeur]);
            case "nom":
                $requete = $connexion->prepare("SELECT * FROM message WHERE nom = :nom");
                $requete->execute(["nom"=>$valeur]);
            case "email":
                $requete = $connexion->prepare("SELECT * FROM message WHERE email = :email");
                $requete->execute(["email"=>$valeur]);
            case "message":
                $requete = $connexion->prepare("SELECT * FROM message WHERE message = :message");
                $requete->execute(["message"=>$valeur]);
            case "dateajout":
                $requete = $connexion->prepare("SELECT * FROM message WHERE dateajout = :dateajout");
                $requete->execute(["dateajout"=>$valeur]);
            default:
            $requete = $connexion->prepare("SELECT * FROM message")->execute();
        }

        return $requete->fetchAll();
		$requete = null;
		$connexion = null;
    }

    public function update($message){
        $connect = new Connect();
		$connexion = $connect->connexion();
		$requete = $connexion->prepare("UPDATE message SET nom=:nom, email=:email, message=:message WHERE id=:id");
		$requete->execute(["id"=>$message->getId(), "nom"=>$message->getNom(), "email"=>$message->getEmail(), "message"=>$message->getMessage()]);
		$requete = null;
		$connexion = null;
    }

    public function delete($message){
        $connect = new Connect();
		$connexion = $connect->connexion();
		$requete = $connexion->prepare("DELETE FROM message WHERE id=:id");
		$requete->execute(["id"=>$message->getId()]);
		$requete = null;
		$connexion = null;
    }
}
?>