<?php
include ("../modele/session.php");
require "..\modele\Class_appart.php";
require "..\modele\Class_proprio.php";
require "..\modele\Class_locataire.php";
require "..\modele\Class_client.php";
require "..\modele\Class_demande.php";


if(isset($_GET['filtre'])){
    switch ($_GET['filtre']) {
        case "clients":
            $Client = new Client();
            $recup=$Client->getAllcilent();
            break;
        case "proprio":
            $PROPRIETAIRES = new PROPRIETAIRES();
            $recup=$PROPRIETAIRES->getAllpro();
            break;
        case "locataire":
            $Locataires = new Locataires();
            $recup=$Locataires->getAlllocataire();
            break;
        case "appart":
            $Appartement = new Appartement();
            $recup=$Appartement->getAllappartliste();
            break;
        case "demande":
            $Demande = new Demande();
            $recup=$Demande->getdemandeAll();
            break;
        default:
        echo "Une erreur est survenu";        
    }
}


?>