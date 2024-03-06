<?php

include ("../modele/session.php");
require "..\modele\Class_client.php";
if(isset($_POST['valider'])){
    if($_POST['mdpverif']==$_POST['mdp']){
$Client = new Client();
$Client->get_infovisiteur($_POST['prenom'],$_POST['adresse'],$_POST['codepostal'],$_POST['nom'],$_POST['ville'],$_POST['tel'],$_POST['login'],$_POST['mdp']);
$Client->inscription();
    }else{
    echo "<p>Mot de passe différente</p>";
}
}


?>