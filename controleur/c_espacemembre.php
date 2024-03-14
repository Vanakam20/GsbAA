<?php
include ("../modele/session.php");
require "..\modele\Class_client.php";
$Client = new Client();
$recup=$Client->getcilent($_SESSION['pseudo']);
if(isset($_POST['valider'])){
    $Client->updatecilent($_SESSION['pseudo'],$_POST['colonne'],$_POST['new']);
    header("Refresh:0");
    }


?>