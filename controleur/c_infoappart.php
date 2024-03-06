<?php
include ("../modele/session.php");
require "..\modele\Class_appart.php";
require "..\modele\Class_locataire.php";
require "..\modele\Class_visite.php";
if(isset($_GET["id"])){
$id=$_GET["id"];
}else{
$id=$_POST["id"];
}
$recup = array();
$Appartement = new Appartement();
$Locataires = new Locataires();
$Visite = new Visite();
$recup = $Appartement->getappart($id);
$recupLocataires = $Locataires->getlocataire($recup['NUMAPPART']);
$totalCotisations = $Appartement->calculerCotisationsParis($recup['PRIX_LOC']);
$recupVisite = $Visite->getvisite($_SESSION['pseudo'],$recup['NUMAPPART']);
if(isset($_POST['valider'])){
    $Locataires->setlocataire($_POST['nom'],$_POST['prenom'], $_POST['bday'], $_POST['tel'],$_POST['rib'], $_POST['tel_banque'], $recup['NUMAPPART']);
    $Locataires->addlocataire();
    header("Refresh:0 url=v_infoappart.php?id=$id");
    }
 if(isset($_GET['effacer'])){
    $Locataires->deletelocataire($id);
    header("Refresh:0 url=v_infoappart.php?id=$id");
}
if(isset($_POST['validervisite'])){
$Visite->get_infovisite($id,$_POST['datevisite']);
$Visite->addvisite();
header("Refresh:0 url=v_infoappart.php?id=$id");
}
if(isset($_GET['effacervisite'])){
    $Visite->deletevisite($_SESSION['pseudo'],$recup['NUMAPPART']);
    header("Refresh:0 url=v_infoappart.php?id=$id");
}
?>