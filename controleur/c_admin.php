<?php
include ("../modele/session.php");
require "..\modele\Class_appart.php";
require "..\modele\Class_proprio.php";
require "..\modele\Class_locataire.php";
require "..\modele\Class_client.php";
$Client = new Client();
$Appartement = new Appartement();
$PROPRIETAIRES = new PROPRIETAIRES();
$Locataires = new Locataires();

if(isset($_GET['filtre'])){
    switch ($_GET['filtre']) {
        case "clients":
            $Client = new Client();
            $recup=$Client->getAllcilent();
            break;
        case "proprio":
            echo "i égal 1";
            break;
        case "locataire":
            echo "i égal 2";
            break;
        case "appart":
            echo "i égal 2";
            break;
        default:
        echo "Une erreur est survenu";        
    }
}


?>