<?php
class Utilisateur{
    private $id;
    private $nom;
    private $prenom;
    private $mot_de_passe;
    private $email;
    private $telephone;
    private $dateajout;

    public function __construct($id, $nom, $prenom, $mot_de_passe, $email, $telephone, $dateajout){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mot_de_passe = $mot_de_passe;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->dateajout = $dateajout;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        return $this->id = $id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        return $this->nom = $nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        return $this->prenom = $prenom;
    }

    public function getMotdepasse(){
        return $this->mot_de_passe;
    }

    public function setMotdepasse($mot_de_passe){
        return $this->mot_de_passe = $mot_de_passe;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        return $this->email = $email;
    }

    public function getTelephone(){
        return $this->telephone;
    }

    public function setTelephone($telephone){
        return $this->telephone = $telephone;
    }

    public function getDateajout(){
        return $this->dateajout;
    }

    public function setDateajout($dateajout){
        return $this->dateajout = $dateajout;
    }

    public function toString(){
        echo "Utilisateur[id=".$this->getId().", nom=".$this->getNom().", prenom=".$this->getPrenom().", mot de passe=".$this->getMotdepasse().", email=".$this->getEmail().", telephone=".$this->getTelephone().", dateajout=".$this->getDateajout()."]";
    }
}
?>