<?php
include ("../modele/session.php");
require "..\modele\Class_locataire.php";
$id=$_GET["numappart"];
$Locataires = new Locataires();
$recupLocataires = $Locataires->getlocataire($id);

?>
