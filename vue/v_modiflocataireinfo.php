<html>
<head> 
<!-- table de caractères FR avec accents et ç -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- lien vers la feuille de style -->
<link href="..\style.css" type="text/css" rel="stylesheet"> 
</head>
<body class=autre>

<?php
include ("..\controleur\c_modifmembre.php");
include ('v_hautpage.php');


             echo "<p>Remplissez le formulaire pour modifier le : ".$_GET['type']."</p>";
             echo  "<form method='post' action='v_modiflocataire.php'>";
           
             echo "<input class='champs' type='text' name='new' placeholder='".$_GET['type']."' required>";
             echo    "<input class='champs' type='hidden' name='colonne' value='".$_GET['id']."'><br>";
             echo    "<input class='champs' type='hidden' name='id' value='".$_GET["numappart"]."'>";
             echo   "<div class=form>";
                ?>
</div>

  
                <input class='champs' type="submit" name="valider" value="Modifier" class="registerbtn" >
            </form>
</body>