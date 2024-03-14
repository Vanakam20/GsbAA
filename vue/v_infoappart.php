
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
include ("..\controleur\c_infoappart.php");
include ('v_hautpage.php');
//var_dump($recup);
$nbl = count($recupLocataires);
if ($recup['ASCENSEUR'] == TRUE){
    $a = "Oui"; 
}else{
    $a = "Non"; 
}

if ($recup['PREAVIS'] == TRUE){
    $b = "Oui"; 
}else{
    $b = "Non"; 
}
echo "<div class='caseview' >";

echo "<h3 class='textcentreinfo'>".$recup['TYPAPPART']."</h3>";

ECHO "<p class='previewaddress'>Adresse: ".$recup['RUE'].", Paris ".$recup['ARRONDISSE']."</p><br>";

ECHO "<p class='previewp'>Propriétaire: ".$recup['NOM_CLI']." ".$recup['PRENOM_CLI']."</p> <p class='previewp'>Tel: ".$recup['TEL_CLI']."</p> <br>";

echo "<p class='previewp'>Numbres d'étage: ".$recup['ETAGE']."</p> <p class='previewp'>Ascenseur: ".$a. "</p> ";

echo "<p class='previewp'>Prix des charges: ".$recup['PRIX_CHARG']."€</p> <p class='previewp'>Preavis: ".$b. "</p> ";
if($nbl>0 && !isset($_GET['effacer'])){
for($i=0;$i<count($recupLocataires);$i++)
    {
    ECHO "<p class='previewlocataire'>Locataire: ".$recupLocataires[$i]['NOM_LOC'].",".$recupLocataires[$i]['PRENOM_LOC'].", Tel: ".$recupLocataires[$i]['TEL_LOC']."</p>";
    }
}
if($_SESSION['proprio']==$recup['LOGIN']){
ECHO "<a class='previewp' href='v_modiflocataire.php?id=".$recup['NUMAPPART']."'>Modifier le locataire</a><br>";
echo "<p class='previewp'>Total des cotisations à payer à l'année : " . $totalCotisations . " euros</p>";
echo "<h3 class='textcentreinfo'>Mois/".$recup['PRIX_LOC']."€ HT</h3>";


    if($nbl==0){
            echo "<a class=previewp href='v_locataire.php?id=".$recup['NUMAPPART']."'>Ajoutée un locataire</a><br>";
    }elseif($nbl==1 && !isset($_GET['effacer'])){
            echo "<a class=previewp href='v_infoappart.php?id=".$recup['NUMAPPART']."&effacer=1'>Supprimer le locataire</a><br>";
    }
    echo "<a class=previewp href='v_appartement.php?id=".$recup['NUMAPPART']."&effacerappart=1'>Supprimer l'appartement</a><br>";
}
echo "</div>";
$nb2 = count($recupVisite);
if($_SESSION['proprio']!=$recup['LOGIN']){
if($nb2==0 && $nbl==0){
echo "<div class='caseview' >";
echo "<h3 class='textcentreinfo'>Visite</h3>";
echo "<form method='post' action='v_infoappart.php'>";
echo "<p>Ajouter une date de visite :</p>";
echo "<input class='champs' type='date' name='datevisite' required>";
ECHO "<input type='hidden' name='id' value=".$recup['NUMAPPART'].">";
echo "<input class='champs' type='submit' name='validervisite' value='Ajouter la visite' class='registerbtn' >";
echo "</form>";
echo "</div>";
}elseif(!isset($_GET['effacervisite'])){
    for($i=0;$i<$nb2;$i++)
    {
    echo "<div class='caseview' >";
    echo "<h3 class='textcentreinfo'>Visite</h3>";
    echo "<p class='previewaddress'>Visite Programmé le ".$recupVisite[$i]['DATE_VISITE']."</p><br>";
    echo "<a class=case href='v_infoappart.php?id=".$recup['NUMAPPART']."&effacervisite=1'>Supprimer la visite</a>";
    echo "</div>";
    }
    }
}
if($_SESSION['proprio']==$recup['LOGIN']){
    if(count($infodemande)>0){
        for($i=0;$i<count($infodemande);$i++){
        echo "<div class='caseview' >";
        echo "<h3 class='textcentreinfo'>Demande</h3>";
        ECHO "<p class='previewaddress'>DE : ".$infodemande[$i]['PRENOM_CLI']." ".$infodemande[$i]['NOM_CLI']."</p><br>";
        echo "<a class=previewp   href='v_infoappart.php?id=".$recup['NUMAPPART']."&effacervisite=1'>Accepter</a> <a class=previewp  href='v_infoappart.php?id=".$recup['NUMAPPART']."&effacervisite=1'>Refuser</a>";
        echo "</div>";
        }
    }
}
 ?>
</body>