<?php
class Visite {
    private $NUMAPPART;
    private $NUM_CLI;
    private $DATE_VISITE;

    // Constructeur
    public function __construct() {

    }
	
    public function addvisite()
    {
    require "db_inc.php";

    $query = "INSERT INTO visiter (NUMAPPART, NUM_CLI, DATE_VISITE) VALUES (:NUMAPPART, :NUM_CLI, :DATE_VISITE)";
    $queryprop = $rex->prepare("SELECT NUM_CLI FROM clients WHERE LOGIN = :login");
    $queryprop->bindParam(':login', $_SESSION['pseudo']);
    $this->NUM_CLI = $queryprop->execute();
        $statement = $rex->prepare($query);
        $statement->bindValue(':DATE_VISITE', $this->DATE_VISITE);
        $statement->bindValue(':NUMAPPART', $this->NUMAPPART);
        $statement->bindValue(':NUM_CLI', $this->NUM_CLI);
        if($statement->execute()){
            echo "Visite ajouté";
        }else{
            echo "Probleme survenu";
        }
    }

    public function get_infovisite($numappart,$date_visite)
	{
        $this->NUMAPPART = $numappart;
        $this->DATE_VISITE = $date_visite;
	}
    public function getvisite($id,$numappart)
    {
        require "db_inc.php";

        $queryprop = $rex->prepare("SELECT * FROM visiter join clients on visiter.NUM_CLI = clients.NUM_CLI where LOGIN = '$id' and NUMAPPART = $numappart");
        $queryprop->execute();
        return $queryprop->fetchAll();
    }
    public function deletevisite($id,$numappart)
    {
        require "db_inc.php";
        $queryprop = $rex->prepare("SELECT NUM_CLI FROM clients WHERE LOGIN = :login");
        $queryprop->bindParam(':login', $_SESSION['pseudo']);
        $this->NUM_CLI = $queryprop->execute();
        $queryprop = $rex->prepare("DELETE FROM visiter where NUM_CLI = $this->NUM_CLI and NUMAPPART = $numappart");
        $queryprop->execute();
        if($queryprop->execute()==True){
            echo "<p>Visite supprimer avec succès</p>";
        }else{
            echo "<p>Une erreur est survenu</p>";
        }
    }

}
 ?>
