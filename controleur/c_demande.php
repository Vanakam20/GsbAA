<?php
include ("../modele/session.php");
require "..\modele\Class_demande.php";
require "..\modele\Class_arrondi.php";
require "..\modele\Class_client.php";
$arrondissement = new arrondissement();
$arrondissementliste=$arrondissement->getarrondisement();
if(isset($_POST['valider'])){
$Client = new Client();
$id=$Client->idclient($_SESSION['pseudo']);
$Demande = new Demande();
$Demande->get_infodemande($_POST['arrondissement'],$_POST['datelimite'],$_POST['typeappart'],$id['NUM_CLI']);
$Demande->addappart();
}

?>