<?php
include ("../modele/session.php");
require "..\modele\Class_locataire.php";
if(isset($_GET["id"])){
    $id=$_GET["id"];
    }else{
    $id=$_POST["id"];
    }
$Locataires = new Locataires();
$recupLocataires = $Locataires->getlocataire($id);
if(isset($_POST['valider'])){
$Locataires->updateloca($id,$_POST['colonne'],$_POST['new']);
header("Refresh:0 url=v_modiflocataire.php?id=$id");
}
?>