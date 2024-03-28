<?php
include ("../modele/session.php");
require "..\modele\Class_appart.php";
require "..\modele\Class_locataire.php";
require "..\modele\Class_visite.php";
require "..\modele\Class_demande.php";
require "..\modele\Class_client.php";

if(isset($_GET["id"])){
$id=$_GET["id"];
}else{
$id=$_POST["id"];
}
$recup = array();
$Appartement = new Appartement();
$Locataires = new Locataires();
$Visite = new Visite();
$Demande = new Demande();

$recup = $Appartement->getappart($id);
$recupLocataires = $Locataires->getlocataire($recup['NUMAPPART']);
$totalCotisations = $Appartement->calculerCotisationsParis($recup['PRIX_LOC']);
if(isset($_SESSION['pseudo'])){
$recupVisite = $Visite->getvisite($_SESSION['pseudo'],$recup['NUMAPPART']);
}
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
    $Client = new Client();
    $cli_id=$Client->idclient($_SESSION['pseudo']);
$Visite->addvisite($id,$_POST['datevisite'],$cli_id[0]);
header("Refresh:0 url=v_infoappart.php?id=$id");
}
if(isset($_GET['effacervisite'])){
    $Visite->deletevisite($_SESSION['pseudo'],$recup['NUMAPPART']);
    header("Refresh:0 url=v_infoappart.php?id=$id");
}
if(isset($_GET['acceptedem'])){
    if($_GET['acceptedem']==0){
    $Demande->deletedemandeappart($_GET['id_demande'],$_GET['id']);
    }else{
    $Demande->accepterdemandeappart($_GET['id_demande']);
    $Demande->deletedemandetj($_GET['id_demande'],$_GET['id']);
    }
    //header("Refresh:0 url=v_infoappart.php?id=$id");
}
if(isset($_GET['id_dem'])){
    $Demande->deletedemande($_GET['id_dem']);
}
if(isset($_POST['prix_loc'])){
    $Appartement->updateprix($_GET['id'],$_POST['prix_loc']);
}
$infodemande=$Demande->getdemandeapparttj($recup['NUMAPPART']);
?>