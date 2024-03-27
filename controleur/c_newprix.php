<?php
include ("../modele/session.php");
require "..\modele\Class_appart.php";

$id=$_GET["id"];
$recup = array();
$Appartement = new Appartement();
$recup = $Appartement->getappart($id);




?>