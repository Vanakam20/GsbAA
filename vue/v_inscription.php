
<html>
<head> 


<!-- table de caractères FR avec accents et ç -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- lien vers la feuille de style -->
<link href="../style.css" type="text/css" rel="stylesheet"> 
</head>
<body class=autre>

<?php
include ("..\controleur\c_inscription.php");
include ('v_hautpage.php');
?>


<br>
        <?php


            ?>
<div class=fond>
<div class=centre>
            <br>
            <p>Remplissez le formulaire ci-dessous pour vous inscrire:</p>
            <form method="post" action="v_inscription.php">
			    <input class='champs' type="text" name="nom" placeholder="nom" required>
                <input class='champs' type="text" name="prenom" placeholder="prenom" required><br>
                <input class='champs' type="text" name="login" placeholder="Votre pseudo " required>
                <input class='champs' type="password" name="mdp" placeholder="Votre mot de passe" required>
                <input class='champs' type="password" name="mdpverif" placeholder="Confirmer Votre mot de passe" required><br>
                <input class='champs' type="text" name="ville" placeholder="ville" required>
                <input class='champs' type="text" pattern="[0-9]{9}" name="tel" placeholder="Tel" required>
				<input class='champs' type="text" name="adresse" placeholder="adresse" required>
				<input class='champs' type="text"  pattern="[0-9]{5}" name="codepostal" placeholder="codepostal" required>
                <div class=form>
</div>
<div class=form>
  <label>
    Veuillez saisir votre date de naissance :
    <input class='champs' type="date" name="bday">
  </label>
  </div>
  
                <input class='champs' type="submit" name="valider" value="S'inscrire" class="registerbtn" >
            </form>
 </div>
 </div>

            <?php
        
        ?>

</body>