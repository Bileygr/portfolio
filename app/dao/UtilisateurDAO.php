<?php
require_once("CRUD.php");
require_once("../model/Utilisateur.php");
require_once("../../conf/Connect.php");

class UtilisateurDAO implements CRUD{
    public function create($utilisateur){
        $connect = new Connect();
		$connexion = $connect->connexion();
		$requete = $connexion->prepare("INSERT INTO utilisateur(nom, prenom, mot_de_passe, email, telephone, dateajout) VALUES(:nom, :prenom, :mot_de_passe, :email, :telephone, NOW())");
		$requete->execute(["nom"=>$utilisateur->getNom(), "prenom"=>$utilisateur->getPrenom(), "mot_de_passe"=>$utilisateur->getMotdepasse(), "email"=>$utilisateur->getEmail(), "telephone"=>$utiliateur->getTelephone()]);
		$requete = null;
		$connexion = null;
    }

    public function read($champ, $valeur){
        $connect = new Connect();
        $connexion = $connect->connexion();
        $requete = null;
        
        switch ($champ){
            case "id":
                $requete = $connexion->prepare("SELECT * FROM utilisateur WHERE id = :id");
                $requete->execute(["id"=>$valeur]);
            case "nom":
                $requete = $connexion->prepare("SELECT * FROM utilisateur WHERE nom = :nom");
                $requete->execute(["nom"=>$valeur]);
            case "prenom":
                $requete = $connexion->prepare("SELECT * FROM utilisateur WHERE prenom = :prenom");
                $requete->execute(["prenom"=>$valeur]);
            case "mot_de_passe":
                $requete = $connexion->prepare("SELECT * FROM utilisateur WHERE mot_de_passe = :mot_de_passe");
                $requete->execute(["mopt_de_passe"=>$valeur]);    
            case "email":
                $requete = $connexion->prepare("SELECT * FROM utilisateur WHERE email = :email");
                $requete->execute(["email"=>$valeur]);
            case "telephone":
                $requete = $connexion->prepare("SELECT * FROM utilisateur WHERE telephone = :telephone");
                $requete->execute(["telephone"=>$valeur]);
            case "dateajout":
                $requete = $connexion->prepare("SELECT * FROM utilisateir WHERE dateajout = :dateajout");
                $requete->execute(["dateajout"=>$valeur]);
            default:
            $requete = $connexion->prepare("SELECT * FROM utilisateur")->execute();
        }

        return $requete->fetchAll();
		$requete = null;
		$connexion = null;
    }

    public function update($utilisateur){
        $connect = new Connect();
		$connexion = $connect->connexion();
		$requete = $connexion->prepare("UPDATE utilisateur SET nom=:nom, prenom=:prenom, mot_de_passe=:mot_de_passe, email=:email, telephone=:telephone WHERE id=:id");
		$requete->execute(["id"=>$utilisateur->getId(), "nom"=>$utilisateur->getNom(), "prenom"=>$utiliateur->getPrenom(), "mot_de_passe"=>$utilisateur->getMotdepasse(), "email"=>$utilisateur->getEmail(), "telephone"=>$utilisateur->getTelephone()]);
		$requete = null;
		$connexion = null;
    }

    public function delete($utilisateur){
        $connect = new Connect();
		$connexion = $connect->connexion();
		$requete = $connexion->prepare("DELETE FROM utilisateur WHERE id=:id");
		$requete->execute(["id"=>$utilisateur->getId()]);
		$requete = null;
		$connexion = null;
    }
}
?>