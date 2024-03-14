<?php
class Demande {
    private $type_dem;
    private $date_limite;
    private $arrondissement;
    private $num_cli;

    // Constructeur
    public function __construct() {

    }
	
    public function addappart()
    {
    require "db_inc.php";

    $query = "INSERT INTO demandes (TYPE_DEM, DATE_LIMITE, ARRONDISS_DEM, NUM_CLI, Statue) VALUES (:TYPE_DEM, :DATE_LIMITE, :ARRONDISS_DEM, :NUM_CLI, :Statue)";
        $statement = $rex->prepare($query);
        $statement->bindValue(':TYPE_DEM', $this->type_dem);
        $statement->bindValue(':DATE_LIMITE', $this->date_limite);
        $statement->bindValue(':ARRONDISS_DEM', $this->arrondissement);
        $statement->bindValue(':NUM_CLI', $this->num_cli);
        $statement->bindValue(':Statue', "En attente");
        if($statement->execute()){
            echo "Demande ajouté";
        }else{
            echo "Probleme survenu";
        }
    }

    public function get_infodemande($arrondissement, $date_limite, $type_dem, $num_cli)
	{
        $this->arrondissement = $arrondissement;
        $this->date_limite = $date_limite;
        $this->type_dem = $type_dem;
        $this->num_cli = $num_cli;

	}
    public function getdemande($id)
    {
        require "db_inc.php";

        $queryprop = $rex->prepare("SELECT * FROM demandes join clients on demandes.NUM_CLI = clients.NUM_CLI where LOGIN = '$id'");
        $queryprop->execute();
    return $queryprop->fetchALL();
    }
    public function deletedemande($id)
    {
        require "db_inc.php";

        $queryprop = $rex->prepare("DELETE FROM demandes where NUM_DEM = $id");
        $queryprop->execute();
        if($queryprop->execute()==True){
            echo "<p>demande supprimer avec succès</p>";
        }else{
            echo "<p>Une erreur est survenu</p>";
        }
    }
    public function getdemandeappart($type,$arrondissement)
    {
        require "db_inc.php";

        $queryprop = $rex->prepare("SELECT * FROM demandes join clients on demandes.NUM_CLI = clients.NUM_CLI where TYPE_DEM='$type' and ARRONDISS_DEM = '$arrondissement'  ");
        $queryprop->execute();
        return $queryprop->fetchALL();
    }
    

}
 ?>
