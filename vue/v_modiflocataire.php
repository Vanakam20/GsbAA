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
include ("..\controleur\c_modiflocataire.php");
include ('v_hautpage.php');
echo "<h3 class='textcentre'>Informations du locataire</h3>";
echo "<div class='caseview' >";
for($i=0;$i<count($recupLocataires);$i++){
echo "<p class='previewaddress'>Nom : ".$recupLocataires[$i]['NOM_LOC']."</p>";
echo "<a class='overlay' href='v_modiflocataireinfo.php?id=NOM_LOC&type=Nom&numappart=$id'>Modifier</a>";
echo "<p class='previewaddress'>Prenom : ".$recupLocataires[$i]['PRENOM_LOC']."</p>";
echo "<a class='overlay' href='v_modiflocataireinfo.php?id=PRENOM_LOC&type=Prenom&numappart=$id'>Modifier</a>";
echo "<p class='previewaddress'>RIB : ".$recupLocataires[$i]['R_I_B']."</p>";
echo "<a class='overlay' href='v_modiflocataireinfo.php?id=R_I_B&type=RIB&numappart=$id'>Modifier</a>";
echo "<p class='previewaddress'>Tel banque : ".$recupLocataires[$i]['TEL_BANQUE']."</p>";
echo "<a class='overlay' href='v_modiflocataireinfo.php?id=TEL_BANQUE&type=Tel&nbsp;Banque&numappart=$id'>Modifier</a>";;
echo "<p class='previewaddress'>Tel : ".$recupLocataires[$i]['TEL_LOC']."</p>";
echo "<a class='overlay' href='v_modiflocataireinfo.php?id=TEL_LOC&type=Tel&numappart=$id'>Modifier</a>";
}

?>

</div>

</body>