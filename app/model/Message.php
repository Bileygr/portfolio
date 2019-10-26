<?php
class Message {
    private $id;
    private $nom;
    private $email;
    private $message;
    private $dateajout;

    function __construct($id, $nom, $email, $message, $dateajout){
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->message = $message;
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

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        return $this->email = $email;
    }

    public function getMessage(){
        return $this->message;
    }

    public function setMessage($message){
        return $this->message = $message;
    }

    public function getDateajout(){
        return $this->dateajout;
    }

    public function setDateajout($dateajout){
        return $this->dateajout = $dateajout;
    }

    public function toString(){
        echo "Message [id=".$this->id.", nom=".$this->nom.", email=".$this->email.", message=".$this->message.", dateajout=".$this->dateajout."]";
    }
}
?>