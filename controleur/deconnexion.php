<?php

	/*************************
	*  Page: deconnexion.php
	*  Page encodée en UTF-8
	**************************/

session_start();//session_start() nous permet ici d'appeler toutes les sessions actives de l'utilisateur, enregistrées avec $_SESSION['nom_que_vous_souhaitez']

unset($_SESSION['pseudo']);//unset() détruit une variable, si vous enregistrez aussi l'id du membre (par exemple) vous pouvez comme avec isset(), mettre plusieurs variables séparés par une virgule:
if(isset($_SESSION['proprio'])){
unset($_SESSION['proprio'],$_SESSION['proprionum']);
}
if(isset($_SESSION['admin'])){
unset($_SESSION['admin']);
}
header("Refresh: 3; url='..\index.php'");//redirection vers le formulaire de connexion dans 5 secondes
echo "Vous avez été correctement déconnecté du site.<br><br><i>Redirection en cours, vers la page d'accueil...</i>";

?>