<?php
require_once("app/imports.php");

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

        $i = 0;
        $messages = array();
        $message = null;
        $sql = "";
        $requete = null;
        
        switch($champ){
            case "":
                $sql = "SELECT * FROM message";
                $requete = $connexion->prepare($sql);
                $requete->execute();
                break;
            default:
                $sql = "SELECT * FROM message WHERE ".$champ."=?";
                $requete = $connexion->prepare($sql);
                $requete->execute([$valeur]);
                break;
        }

        $lignes = $requete->fetchAll();

        foreach($lignes as $ligne){
            $message = new Message(
                $ligne["id"],
                $ligne["nom"],
                $ligne["email"],
                $ligne["message"],
                $ligne["dateajout"]
            );

            $messages[$i] = $message;
            $i++;
        }

        return $messages;
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