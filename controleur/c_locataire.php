<?php
include ("../modele/session.php");
require "..\modele\Class_appart.php";
require "..\modele\Class_locataire.php";

$id=$_GET["id"];
$recup = array();
$Appartement = new Appartement();
$recup = $Appartement->getappart($id);




?>