<?php
include ("../modele/session.php");
require "..\modele\Class_client.php";
require "..\modele\Class_appart.php";
$Client = new Client();
$recup=$Client->getcilent($_SESSION['pseudo']);
if(isset($_POST['valider'])){
    $Client->updatecilent($_SESSION['pseudo'],$_POST['colonne'],$_POST['new']);
    header("Refresh:0");
    }
if(isset($_SESSION['proprionum'])){
    $Appartement = new Appartement();
    $recupAppart=$Appartement->getvosappart($_SESSION['pseudo']);
}

?>