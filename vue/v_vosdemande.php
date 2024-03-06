
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
include ("..\controleur\c_vosdemande.php");
include ('v_hautpage.php');
echo "<h1>Vos demandes</h1>";
$nb=count($recup);
if($nb==0){
    echo "<p>Pas de demande</p>";
}else{
for($i=0;$i<$nb;$i++)
{
echo "<div class='previewcase' >";
echo "<a class='overlay' href='v_appartement.php?arrondis=".$recup[$i]['ARRONDISS_DEM']."&filtre=".$recup[$i]['TYPE_DEM']."&nbsp;Dans&nbsp;le&nbsp;".$recup[$i]['ARRONDISS_DEM']."&info=demande&type=".$recup[$i]['TYPE_DEM']."'>";
echo "<h3 class='textcentre'>".$recup[$i]['TYPE_DEM']."</h3>";
ECHO "<p class='previewaddress'>Dans le  ".$recup[$i]['ARRONDISS_DEM']."</p><br>";
echo "<p class='previewp'>Jusqu'au: ".$recup[$i]['DATE_LIMITE']."</p> ";
echo "</a>";
echo "<a class=previewaddress href='v_vosdemande.php?id=".$recup[$i]['NUM_DEM']."&effacedemande=1'>Supprimer la demande</a><br>";
echo "</div>";
}
}
 ?>
</body>