
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
include ("..\controleur\c_connexion.php");
include ('v_hautpage.php');
?>
</div>
 <?php


            if(!isset($TraitementFini)){//quand le membre sera connecté, on définira cette variable afin de cacher le formulaire
                ?>
				<div class=fond>
				<div class=centre>
                <br>
                <p>Remplissez le formulaire ci-dessous pour vous connecter:</p>
                <form method="post" action="v_connexion.php">
                    <input class='champs' type="text" name="login" placeholder="Votre pseudo..." required><!-- required permet d'empêcher l'envoi du formulaire si le champ est vide -->
                    <input class='champs' type="password" name="mdp" placeholder="Votre mot de passe..." required>
                    <input class='champs' type="submit" name="valider" value="Connexion!" class="registerbtn">
                </form>
                <?php
            }
        
        ?>
 </div>
 </div>
</body>