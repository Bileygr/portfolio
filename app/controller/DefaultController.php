<?php
require_once("app/imports.php");

class DefaultController{
    public function accueil(){
        $moteur = new Moteur;
        $moteur->afficher("index.html");

        if(isset($_POST["envoyer"])){
            $messageDAO = new MessageDAO;
            $message = new Message(null, $_POST["nom"], $_POST["email"], $_POST["message"], null);
            $messageDAO->create($message);
            header('Location: index.php');
        }
    }

    public function connexion(){
        $moteur = new Moteur;
        $moteur->afficher("connexion.html");

        $utilisateurDAO = new UtilisateurDAO;

        $email = "";
        $mot_de_passe = "";

        if(isset($_POST["connecter"])){
            $email = $_POST["email"];
            $mot_de_passe = $_POST["mot_de_passe"];

            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $utilisateurs = $utilisateurDAO->read("email", $email);
                $utilisateur = $utilisateurs[0];

                if(password_verify($mot_de_passe, $utilisateur->getMotdepasse())){
                    session_start();
                    $_SESSION["utilisateur"] = $utilisateur;
                    header("Location: messages.php");
                }else{
                    echo "Mauvais mot de passe.";
                }
            }
        }
    }

    public function deconnexion(){
        session_start();
        if(session_destroy()){
            header("Location: connexion.php");
        }
    }

    public function inscription(){
        $moteur = new Moteur;
        $moteur->afficher("inscription.html");

        $utilisateurDAO = new UtilisateurDAO;
        
        $nom = "";
        $prenom = "";
        $mot_de_passe = "";
        $email = "";
        $telephone = "";

        if(isset($_POST["inscrire"])){
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $mot_de_passe = $_POST["mot_de_passe"];
            $email = $_POST["email"];
            $telephone = $_POST["telephone"];

            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $utilisateur = new Utilisateur(
                    null,
                    $nom,
                    $prenom,
                    password_hash($mot_de_passe, PASSWORD_BCRYPT),
                    $email,
                    $telephone,
                    null
                );
                $utilisateurDAO->create($utilisateur);
                header("Location: connexion.php");
            }
        }
    }

    public function messages(){
        session_start();
        $moteur = new Moteur;
        $messageDAO = new MessageDAO;
        $messages = null;
        $messages_affiche = "";

        if(isset($_SESSION["utilisateur"])){
            $messages = $messageDAO->read("", "");

            foreach($messages as $message){
                $messages_affiche .= "<p><b><u>Nom</u></b>: ".$message->getNom()."</p> <p><b><u>Email</u></b>: ".$message->getEmail()."</p><p><b><u>Message</u></b>: ".$message->getMessage()."</p><hr>";
            }

            $moteur->assigner("messages", $messages_affiche);
            $moteur->afficher("messages.html");
        }else{
            header("Location: connexion.php");
        }
    }

    public function test(){
        $moteur = new Moteur;
        $moteur->afficher("test.html");
    }
}
?>