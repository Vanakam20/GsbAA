
<html>
<head> 
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4259434794203201"
     crossorigin="anonymous"></script>
<!-- table de caractères FR avec accents et ç -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- lien vers la feuille de style -->
<link href="..\style.css" type="text/css" rel="stylesheet"> 
</head>
<body class=autre>
<?php
include ("..\controleur\c_appartement.php");
include ('v_hautpage.php');

echo "<div class='filbar'>";
echo "<a class=case  href='v_appartement.php' >Effacer le Filtre</a>";
if(isset($_SESSION['proprio']) ) {
echo "<a class=case href='v_appartement.php?filtre=Vos&nbsp;Apparement&info=vosappart'> Vos Apparements</a>";
}

echo "</div>";

if(isset($_GET['filtre'])){
    ECHO "<h1>".$_GET['filtre']."</h1>";
     }
$nb=count($recup);
if($nb==0){
    echo "<p>Pas de resultat</p>";
}else{
for($i=0;$i<$nb;$i++)
{
if ($recup[$i]['ASCENSEUR'] == TRUE){
    $a = "Oui"; 
}else{
    $a = "Non"; 
}
echo "<a class='overlay' href='v_infoappart.php?id=".$recup[$i]['NUMAPPART']."'>";
echo "<div class='previewcase' >";
echo "<h3 class='textcentre'>".$recup[$i]['TYPAPPART']."</h3>";
ECHO "<p class='previewaddress'>Adresse: ".$recup[$i]['RUE'].", Paris ".$recup[$i]['ARRONDISSE']."</p><br>";
echo "<p class='previewp'>Numbres d'étage: ".$recup[$i]['ETAGE']."</p> <p class='previewp'>Ascenseur: ".$a. "</p> ";
echo "<h3 class='textcentre'>Mois/".$recup[$i]['PRIX_LOC']."€ HT</h3>";
echo "</div></a>";
}
}
 ?>
</body>