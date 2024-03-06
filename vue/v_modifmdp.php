
<html>
<head> 


<!-- table de caractères FR avec accents et ç -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- lien vers la feuille de style -->
<link href="../style.css" type="text/css" rel="stylesheet"> 
</head>
<body class=autre>

<?php
include ("..\controleur\c_modifmdp.php");
include ('v_hautpage.php');
?>


<br>
        <?php


            ?>
<div class=fond>
<div class=centre>
            <br>
            <p>Remplissez le formulaire pour changer le mot de passe:</p>
            <form method="post" action="v_modifmdp.php">
                <input class='champs' type="password" name="oldmdp" placeholder="Saisir l'ancien mot de passse" required>
                <input class='champs' type="password" name="mdp" placeholder="Saisir le nouveau mot de passse" required>
                <input class='champs' type="password" name="mdpverif" placeholder="Confirmer le nouveau mot de passse" required><br>

                <div class=form>
</div>
  
                <input class='champs' type="submit" name="valider" value="Modifier" class="registerbtn" >
            </form>
 </div>
 </div>

            <?php
        
        ?>

</body>