<html>
<head> 


<!-- table de caractères FR avec accents et ç -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- lien vers la feuille de style -->
<link href="../style.css" type="text/css" rel="stylesheet"> 
</head>
<body class=autre>
<table class=t2>
<div class="navbar"><a href="../index.php?action=init" class=case>Tapie Immobiliere </a>

<?php
if(!isset($_SESSION['pseudo'])){
    echo "<a href='..\index.php?action=inscription'class=case> Inscription </a>";
     echo "<a href='..\index.php?action=connexion'class=case> S'identifier </a>";
     echo "<a href='..\index.php?action=appartement'class=case> Appartments </a>";

 } else {
    echo "<a href='..\index.php?action=appartement'class=case> Appartments </a>";
     if(!isset($_SESSION['proprio']) ) {
        echo "<a href='..\index.php?action=new-proprio'class=case> Vous êtes Proprio ? </a>";
        echo "<a href='../index.php?action=demande'class=case> Demander un Appartements </a>";
        echo "<a href='..\index.php?action=vosdemande'class=case>Vos demandes</a>";
    }else{
        echo "<a href='..\index.php?action=immobiliere'class=case> Ajouter de immobiliére </a>";
    }
    echo "<a href='..\index.php?action=espace'class=case>".$_SESSION['pseudo']."</a>";
    echo "<a href='../index.php?action=deconnexion'class=case> Déconnexion </a>";
 }

 
?>
</div>
</table>
</body>