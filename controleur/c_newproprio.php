<?php
include ("../modele/session.php");
require "..\modele\Class_proprio.php";
if(isset($_POST['valider'])){
$PROPRIETAIRES = new PROPRIETAIRES();
$PROPRIETAIRES->inscription($_SESSION['pseudo']);
$PROPRIETAIRES->verifpro($_POST['login']);
}



?>