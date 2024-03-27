<?php
include ("../modele/session.php");
require "..\modele\Class_client.php";
require "..\modele\Class_proprio.php";

 if(isset($_POST['valider'])){
$Client = new Client();
$Client->connexion($_POST['login'], $_POST['mdp']);
$PROPRIETAIRES = new PROPRIETAIRES();
$PROPRIETAIRES->verifpro($_POST['login']);
$Client->verifadmin($_POST['login']);
if(isset($_SESSION['pseudo'])){
    $TraitementFini=0;
}
 }


?>