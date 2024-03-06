<?php
include ("../modele/session.php");
require "..\modele\Class_demande.php";
$Demande = new Demande();
$recup=$Demande->getdemande($_SESSION['pseudo']);

if(isset($_GET['effacedemande'])){
$Demande->deletedemande($_GET['id']);
$page = $_SERVER['PHP_SELF'];
header("Refresh:0 url=$page ");
}

?>
