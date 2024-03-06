<?php
include ("../modele/session.php");
require "..\modele\Class_client.php";
require "..\modele\Class_proprio.php";
$Client = new Client();
$recup=$Client->getcilent($_SESSION['pseudo']);
if(isset($_POST['valider'])){
    if(isset($_SESSION['proprio'])){
    switch($_POST['colonne']){
        case "PRENOM_CLI" :
            $colonnepro = "PRENOM";
            break;
        case "ADRESSE_CLI" :
            $colonnepro = "ADRESSE";
            break;
        case "NOM_CLI" :
            $colonnepro = "NOM";
            break;
        case "CODEVILLE_CLI" :
            $colonnepro = "CODE_VILLE";
            break;
        case "TEL_CLI" :
            $colonnepro = "TEL";
            break;
        default:
       echo "Erreur survenu";
    }
    $PROPRIETAIRES = new PROPRIETAIRES();
    $PROPRIETAIRES->updatepro($_SESSION['pseudo'],$colonnepro,$_POST['new']);
}

    $Client->updatecilent($_SESSION['pseudo'],$_POST['colonne'],$_POST['new']);
    header("Refresh:0");
    }


?>