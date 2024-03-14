
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
include ("..\controleur\c_newproprio.php");
include ('v_hautpage.php');
?>
</div>
 <?php


            if(!isset($_SESSION['proprio'])){//quand le membre sera connecté, on définira cette variable afin de cacher le formulaire
                ?>
				<div class=fond>
				<div class=centre>
                <br>
                <form method="post" action="v_newproprio.php">
                <p>Cliquer ici pour devenir proprio:</p>

                    <input type="submit" name="valider" value="Devenir proprio" class="registerbtn">
                </form>
                <?php
            }
        
        ?>
 </div>
 </div>
</body>