<?php
require_once("app/imports.php");
require_once("app/controller/DefaultController.php");

$defaultcontroller = new DefaultController;
$defaultcontroller->messages();
?>