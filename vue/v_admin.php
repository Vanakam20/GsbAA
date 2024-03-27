
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
include ("..\controleur\c_admin.php");
include ('v_hautpage.php');

echo "<div class='filbar'>";
echo "<a class=case  href='v_admin.php' >Effacer le Filtre</a>";
echo "<a class=case href='v_admin.php?filtre=clients'> Liste Client </a>";
echo "<a class=case href='v_admin.php?filtre=proprio'> Liste Propriétaire</a>";
echo "<a class=case href='v_admin.php?filtre=locataire'> Liste Locataire</a>";
echo "<a class=case href='v_admin.php?filtre=appart'> Liste Apparements</a>";
echo "</div>";
if(isset($_GET['filtre'])){
var_dump($recup);
echo "<table class='admin'>";
for($y=0;$y<count($recup);$y++){
     echo  "<tr>";
for($i=0;$i<count($recup[1]);$i++){  
     
     echo   "<td>".$recup[$y][$i]."</td>";
}
echo "</tr>";
}
}
echo "</table>";


 ?>
</body>