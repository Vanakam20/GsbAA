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
include ("..\controleur\c_espacemembre.php");
include ('v_hautpage.php');
echo "<h3 class='textcentre'>Vos informations personnels</h3>";
echo "<div class='caseview' >";
echo "<p class='previewaddress'>Nom : ".$recup['NOM_CLI']."</p>";
echo "<a class='overlay' href='v_modifmembre.php?id=NOM_CLI&type=Nom'>Modifier</a>";
echo "<p class='previewaddress'>Prenom : ".$recup['PRENOM_CLI']."</p>";
echo "<a class='overlay' href='v_modifmembre.php?id=PRENOM_CLI&type=Prenom'>Modifier</a>";
echo "<p class='previewaddress'>Ville : ".$recup['VILLE_CLI']."</p>";
echo "<a class='overlay' href='v_modifmembre.php?id=VILLE_CLI&type=Ville'>Modifier</a>";
echo "<p class='previewaddress'>Adresse : ".$recup['ADRESSE_CLI']."</p>";
echo "<a class='overlay' href='v_modifmembre.php?id=ADRESSE_CLI&type=Adresse'>Modifier</a>";
echo "<p class='previewaddress'>Code postal : ".$recup['CODEVILLE_CLI']."</p>";
echo "<a class='overlay' href='v_modifmembre.php?id=CODEVILLE_CLI&type=Code&nbsp;Postal'>Modifier</a>";;
echo "<p class='previewaddress'>Tel : ".$recup['TEL_CLI']."</p>";
echo "<a class='overlay' href='v_modifmembre.php?id=TEL_CLI&type=Tel'>Modifier</a>";
echo "<a class='previewaddress' href='v_modifmdp.php'>Changer de mot de passe</a><br>";
 if(isset($_SESSION['proprionum'])){
     $total=0;
for($i=0;$i<count($recupAppart);$i++){
$total = $recupAppart[$i]['PRIX_LOC'] + $total ;
}
echo "<p> Salaire total brut :<h2>".$total. " €</h2></p>";
}
?>
<form method='post' action='v_Accueil.php'>
<button class="boutondef" Name="valider" type='submit' onclick="return confirm('Êtes vous sure ?');">Supprimer définitivement votre compte.</button>
</form>



</div>

</body>