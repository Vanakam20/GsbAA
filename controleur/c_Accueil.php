<?php
include ("../modele/session.php");
require "..\modele\Class_client.php";
require "..\modele\Class_proprio.php";

if(isset($_POST['valider'])){
$Client = new Client();

$Client->deleteclient($_SESSION['pseudo']);
unset($_SESSION['pseudo']);//unset() détruit une variable, si vous enregistrez aussi l'id du membre (par exemple) vous pouvez comme avec isset(), mettre plusieurs variables séparés par une virgule:
if(isset($_SESSION['proprio'])){
$PROPRIETAIRES = new PROPRIETAIRES();
$PROPRIETAIRES->deletepro($_SESSION['proprio']);
unset($_SESSION['proprio']);
}
}
?>