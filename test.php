<?php
require_once("app/imports.php");
require_once("app/controller/DefaultController.php");

$defaultcontroller = new DefaultController;
$defaultcontroller->test();

$utilisateurDAO = new UtilisateurDAO;
$utilisateurs = $utilisateurDAO->read("id", "1");

echo $utilisateurs[0]->getNom();
?>