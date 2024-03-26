<?php
class arrondissement {
    private $arrondissement;

    // Constructeur
    public function __construct() {
    }
	

public function getarrondisement() {
    require "db_select.php";
    
    $queryarron = $rex->prepare("SELECT * FROM arrondissement");
    $queryarron->execute();
    return $queryarron->fetchAll();
                                 
		}
	}





 ?>