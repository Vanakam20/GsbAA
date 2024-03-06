<?php
include ("../modele/session.php");
require "..\modele\Class_client.php";

$Client = new Client();
if(isset($_POST['valider'])){
$oldmdpverif=hash('sha256', $_POST['oldmdp']);
$oldmdp=$Client->checkmdp($_SESSION['pseudo'],$oldmdpverif);
if($oldmdp == TRUE){
    if($_POST['mdpverif']==$_POST['mdp']){
        echo "<p>mot de passe modifier</p>";
        $mdp=hash('sha256', $_POST['mdp']);
        $Client->updatemdp($_SESSION['pseudo'],$mdp);
    }else{
    echo "<p>le nouveau Mot de passe est différente du celui de vérification</p>";
}
}else{
    echo "<p>Ancien mot de passe incorrect</p>";
}

}

?>