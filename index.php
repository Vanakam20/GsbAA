<?php
include_once "./modele/session.php";
include ('class Routeur.php');
if(isset($_GET['action'])) // si l'action vient par l'url
{
	$action = $_GET['action'];
}
else
{
	$action = 'init';
}
if(isset($_POST)) // si il y a un tableau POST
{
	$donnees_postees = array();
	$donnees_postees = $_POST;
	$_SESSION['donnees_postees']=$donnees_postees;
}



$routeur = new Routeur();
$routeur->rediriger($action);

die("erreur inattendue");
?>

