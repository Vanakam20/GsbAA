<?php
include ("../modele/session.php");
require "..\modele\Class_demande.php";
require "..\modele\Class_client.php";
$Demande = new Demande();
$Client = new Client();
$id=$Client->idclient($_SESSION['pseudo']);
$recup=$Demande->getdemande($id["NUM_CLI"]);

if(isset($_GET['effacedemande'])){
$Demande->deletedemande($_GET['id']);
$page = $_SERVER['PHP_SELF'];
header("Refresh:0 url=$page ");
}

?>
