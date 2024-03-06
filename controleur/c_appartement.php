<?php
include ("../modele/session.php");
require "..\modele\Class_appart.php";
$recup = array();
$Appartement = new Appartement();
if(isset($_GET['filtre'])){
    if($_GET['info']=="vosappart"){
        $recup = $Appartement->getvosappart($_SESSION['pseudo']);
    }else{
        $recup = $Appartement->getappartarrondis($_GET['arrondis'],$_GET['type']);
    }
}else{
$recup = $Appartement->getallappart();
}
if(isset($_GET['effacerappart'])){
$Appartement->deletelocataire($_GET['id']);
$page = $_SERVER['PHP_SELF'];
header("Refresh:0 url=$page ");
}


?>