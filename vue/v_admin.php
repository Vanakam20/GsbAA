
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
echo  "<tr>";
echo "<th>NUM_CLI</th>";
echo "<th>NOM_CLI</th>";
echo "<th>PRENOM_CLI</th>";
echo "<th>ADRESSE_CLI</th>";
echo "<th>VILLE_CLI</th>";
echo "<th>CODEVILLE_CLI</th>";
echo "<th>TEL_CLI</th>";
echo "<th>LOGIN</th>";
echo "<th>PROPRIETAIRES</th>";
echo "<th>Admin</th>";
echo  "</tr>";
foreach ($recup as $key => $value) {
echo  "<tr>";
for($i=0;$i<10;$i++){  
     
     echo   "<td>".$value[$i]."</td>";
}
echo "</tr>";
}

}
echo "</table>";


 ?>
</body>