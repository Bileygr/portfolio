<?php
require_once("app/dao/MessageDAO.php");

if(isset($_POST["envoyer"])){
    $messageDAO = new MessageDAO;
    $message = new Message($_POST["nom"], $_POST["email"], $_POST["message"]);
    $messageDAO->create($message);
}else{
    echo "Failed";
}
?>