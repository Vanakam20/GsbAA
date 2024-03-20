<?php
include ("../modele/session.php");
require "..\modele\Class_appart.php";
require "..\modele\Class_locataire.php";
require "..\modele\Class_client.php";

$Client = new Client();
$loc=$Client->getcilent($_SESSION['pseudo']);
$recup = array();
$Appartement = new Appartement();
$recup = $Appartement->getappartdem($_GET["num_dem"]);




?>