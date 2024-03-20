
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
include ("..\controleur\c_locataire_dem.php");
include ('v_hautpage.php');

echo "<div class='caseview' >";
echo "<h3 class='textcentreinfo'>".$recup[0]['TYPAPPART']."</h3>";
ECHO "<p class='previewaddress'>Adresse: ".$recup[0]['RUE'].", Paris ".$recup[0]['ARRONDISSE']."</p><br>";
echo "</div>";

             echo "<p>Remplissez le formulaire pour ajoutée un locataire:</p>";
             echo  "<form method='post' action='v_infoappart.php?id=".$recup[0]['NUMAPPART']."&id_dem=".$_GET["num_dem"]."'>";
            
             echo "<input class='champs' type='text' name='nom' value=".$loc['NOM_CLI']." required>";
             echo "<input class='champs' type='text' name='prenom' value=".$loc['PRENOM_CLI']." required><br>";
             echo "<input class='champs' type='text' name='rib' placeholder='Votre RIB' required>";
             echo "<input class='champs' type='text' name='tel' value=".$loc['TEL_CLI']." required>";
             echo "<input class='champs' type='text' name='tel_banque' placeholder='Tel Banque' required>";
             echo "<input class='champs' type='text' name='codepostal' value=".$loc['CODEVILLE_CLI']." required>";
             echo "<div class=form>";
                ?>
</div>
<div class=form>
<label>
    Veuillez saisir votre date de naissance :
    <input class='champs' type="date" name="bday">
  </label>
  </div>
  
                <input class='champs' type="submit" name="valider" value="Ajoutée" class="registerbtn" >
            </form>
</body>