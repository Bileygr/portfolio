<?php
require_once("app/imports.php");

class UtilisateurDAO implements CRUD{
    public function create($utilisateur){
        $connect = new Connect();
		$connexion = $connect->connexion();
		$requete = $connexion->prepare("INSERT INTO utilisateur(nom, prenom, mot_de_passe, email, telephone, dateajout) VALUES(:nom, :prenom, :mot_de_passe, :email, :telephone, NOW())");
		$requete->execute(["nom"=>$utilisateur->getNom(), "prenom"=>$utilisateur->getPrenom(), "mot_de_passe"=>$utilisateur->getMotdepasse(), "email"=>$utilisateur->getEmail(), "telephone"=>$utilisateur->getTelephone()]);
		$requete = null;
		$connexion = null;
    }

    public function read($champ, $valeur){
        $connect = new Connect();
        $connexion = $connect->connexion();

        $i = 0;
        $utilisateurs = array();
        $utilisateur = null;
        $sql = "";
        $requete = null;
        
        switch($champ){
            case "":
                $sql = "SELECT * FROM utilisateur";
                $requete = $connexion->prepare($sql);
                $requete->execute();
                break;
            default:
                $sql = "SELECT * FROM utilisateur WHERE ".$champ."=?";
                $requete = $connexion->prepare($sql);
                $requete->execute([$valeur]);
                break;
        }

        $lignes = $requete->fetchAll();

        foreach($lignes as $ligne){
            $utilisateur = new Utilisateur(
                $ligne["id"],
                $ligne["nom"],
                $ligne["prenom"],
                $ligne["mot_de_passe"],
                $ligne["email"],
                $ligne["telephone"],
                $ligne["dateajout"]
            );

            $utilisateurs[$i] = $utilisateur;
            $i++;
        }

        return $utilisateurs;
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