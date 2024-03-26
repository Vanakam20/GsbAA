<?php


$login = "connexion2";
    $mdp = "xyz";
    $bd = "aa_gsb";
    $serveur = "localhost";
	 $rex_insert = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
     $rex_insert->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   
?>

