<?php
include ("../modele/session.php");
require "..\modele\Class_appart.php";
require "..\modele\Class_arrondi.php";
$arrondissement = new arrondissement();
$arrondissementliste=$arrondissement->getarrondisement();
if(isset($_POST['valider'])){
$Appartement = new Appartement();
$Appartement->setappart($_POST['rue'],$_POST['arrondissement'],$_POST['etage'],$_POST['preavis'],$_POST['typeappart'],$_POST['prixloc'],$_POST['prixcharge'],$_POST['ascenseur'],$_POST['datelibre']);
$Appartement->addappart();
}



?>