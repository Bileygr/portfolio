<?php
require_once("../dao/MessageDAO.php");

if(isset($_POST["envoyer"])){
    $messageDAO = new MessageDAO;
    $message = new Message($_POST["nom"], $_POST["email"], $_POST["message"]);
    $messageDAO->create($message);
    header('Location: ../../index.html');
}else{
    echo "Failed";
}
?>