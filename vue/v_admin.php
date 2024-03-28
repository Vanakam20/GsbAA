
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
echo "<a class=case href='v_admin.php?filtre=demande'> Liste Demande</a>";
echo "</div>";

if(isset($_GET['filtre'])){
     $nb=count($recup);
     if($nb==0){
          echo "<p>Pas de resultat</p>";
      }else{
     switch ($_GET['filtre']) {
case "clients":
echo "<h1>Liste Client</h1>";
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
     break;
     case "proprio":
          echo "<h1>Liste Propriétaire</h1>";
          echo "<table class='admin'>";
echo  "<tr>";
echo "<th>NUM_CLI</th>";
echo "<th>NOM_CLI</th>";
echo "<th>NOM_CLI</th>";
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
     break;
     case "locataire":
          echo "<h1>Liste Locataire</h1>";
          echo "<table class='admin'>";
echo  "<tr>";
echo "<th>NUMEROLOC</th>";
echo "<th>NOM_LOC</th>";
echo "<th>PRENOM_LOC</th>";
echo "<th>DATENAISS</th>";
echo "<th>TEL_LOC</th>";
echo "<th>R_I_B</th>";
echo "<th>TEL_BANQUE</th>";
echo "<th>NUMAPPART</th>";
echo  "</tr>";
     foreach ($recup as $key => $value) {
echo  "<tr>";
     for($i=0;$i<8;$i++){  
     
     echo   "<td>".$value[$i]."</td>";
}
echo "</tr>";
           }
     break;
     case "appart":
          echo "<h1>Liste Apparements</h1>";
          echo "<table class='admin'>";
echo  "<tr>";
echo "<th>NUMAPPART</th>";
echo "<th>RUE</th>";
echo "<th>ARRONDISSE</th>";
echo "<th>ETAGE</th>";
echo "<th>PREAVIS</th>";
echo "<th>TYPAPPART</th>";
echo "<th>PRIX</th>";
echo "<th>PRIX_CHARGE</th>";
echo "<th>ASCENSEUR</th>";
echo "<th>DATE_LIBRE</th>";
echo "<th>NOM_PROPRIO</th>";
echo "<th>PRENOM_PRPRIO</th>";
echo  "</tr>";
     foreach ($recup as $key => $value) {
echo  "<tr>";
     for($i=0;$i<12;$i++){  
     
     echo   "<td>".$value[$i]."</td>";
}
echo "</tr>";
           }
     break;
     case "demande":
          echo "<h1>Liste Demande</h1>";
          echo "<table class='admin'>";
echo  "<tr>";
echo "<th>NUM_DEM</th>";
echo "<th>TYPE_DEM</th>";
echo "<th>DATE_LIMITE</th>";
echo "<th>ARRONDISS_DEM</th>";
echo "<th>STATUE_DEM</th>";
echo "<th>NOM_DEMANDEUR</th>";
echo "<th>PRENOM_DEMANDEUR</th>";
echo  "</tr>";
     foreach ($recup as $key => $value) {
echo  "<tr>";
     for($i=0;$i<7;$i++){  
     
     echo   "<td>".$value[$i]."</td>";
}
echo "</tr>";
           }
     break;
     default:
        echo "Une erreur est survenu";
          }
     }
}
echo "</table>";


 ?>
</body>