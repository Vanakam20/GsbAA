<?php
include ("../modele/session.php");
require "..\modele\Class_appart.php";
require "..\modele\Class_proprio.php";
$recup = array();
$Appartement = new Appartement();
$PROPRIETAIRES = new PROPRIETAIRES();
if(isset($_SESSION['pseudo'])){
$PROPRIETAIRES->verifpro($_SESSION['pseudo']);
}
if(isset($_GET['filtre'])){
    if($_GET['info']=="vosappart"){
        $recup = $Appartement->getvosappart($_SESSION['pseudo']);
    }else{
        $recup = $Appartement->getappartdem($_GET['num_dem']);
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