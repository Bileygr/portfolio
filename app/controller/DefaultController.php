<?php
require_one("Moteur.php");
require_one("../dao/UtilisateurDAO.php");

class DefaultController{
    public function messages(){

    }
    
    public function connexion(){

    }

    public function inscription(){
        $moteur = new Moteur;
        $moteur->afficher("insciption.html");
    }
}
?>