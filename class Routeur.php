<?php
class Routeur
{
	private $_action;
	private $_route; // chemin du fichier contrôleur
	
	public function __construct()
	{	
		$this->_action = '?'; 
		$this->_route = '?'; 
	}
	
	private function set_chemin_controleur()
	{
		switch($this->_action) {
			case 'init' : 
				{
					$this->_route = 'vue\v_Accueil.php?type=init';
					break;
				}
			case 'connexion' : 
				{
					$this->_route = 'vue\v_connexion.php';
					break;
				}	
			case 'espace-membre' : 
				{
					$this->_route = "vue\v_rapport.php";
					break;
					
				}				
			case 'deconnexion' : 
				{
					$this->_route = 'controleur\deconnexion.php';
					break;
				}
			case 'inscription' : 
				{
					$this->_route = 'vue\v_inscription.php';
					break;
				}
			case 'immobiliere' : 
				{
					$this->_route = 'vue\v_immobiliere.php';
					break;
				}	
			case 'new-proprio' :
				{
					$this->_route = 'vue\v_newproprio.php';
					break;
				}	
			case 'appartement' :
				{
					$this->_route = 'vue\v_appartement.php';
					break;
				}	
			case 'demande' :
				{
					$this->_route = 'vue\v_demande.php';
					break;
				}	
			case 'vosdemande' :
				{
					$this->_route = 'vue\v_vosdemande.php';
					break;
				}
			case 'espace' :
				{
					$this->_route = 'vue\v_espacemembre.php';
					break;
				}
			case 'admin' :
				{
					$this->_route = 'vue\v_admin.php';
					break;
				}
					
			default:
			{ 	$this->_route = 'vue\v_erreur.php' ; }
		}
	}
	
	public function rediriger($action)
	{
		$this->_action = $action;
		$this->set_chemin_controleur();
		$url = $this->_route;
		header("Location: $url"); // redirige
		die ("erreur inattendue");
	}
}
?>