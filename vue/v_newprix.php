
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
include ("..\controleur\c_newprix.php");
include ('v_hautpage.php');
//var_dump($recup);


echo "<div class='caseview' >";
echo "<h3 class='textcentreinfo'>".$recup['TYPAPPART']."</h3>";
ECHO "<p class='previewaddress'>Adresse: ".$recup['RUE'].", Paris ".$recup['ARRONDISSE']."</p><br>";
echo "</div>";

             echo "<p>Remplissez le formulaire pour ajoutée un prix:</p>";
             echo  "<form method='post' action='v_infoappart.php?id=".$recup['NUMAPPART']."'>";
            ?>
				<input class='champs' type="text"  pattern="[0-9]+" name="prix_loc" placeholder="Prix location" required>
                <div class=form>
</div>
<div class=form>
  </div>
  
                <input class='champs' type="submit" name="valider" value="Ajoutée" class="registerbtn" >
            </form>
</body>