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
    require "db_insert.php";

    $query = "INSERT INTO demandes (TYPE_DEM, DATE_LIMITE, ARRONDISS_DEM, NUM_CLI, Statue) VALUES (:TYPE_DEM, :DATE_LIMITE, :ARRONDISS_DEM, :NUM_CLI, :Statue)";
        $statement = $rex_insert->prepare($query);
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
        require "db_select.php";

        $queryprop = $rex->prepare("select distinct demandes.NUM_DEM,TYPE_DEM,DATE_LIMITE,ARRONDISS_DEM,Statue,demandes.NUM_CLI from demandes_tj join demandes on demandes_tj.NUM_DEM = demandes.NUM_DEM where demandes.NUM_CLI ='$id'");
        $queryprop->execute();
    return $queryprop->fetchALL();
    }
    public function deletedemande($id)
    {
        require "db_update.php";

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
        require "db_select.php";

        $queryprop = $rex->prepare("SELECT * FROM demandes join clients on demandes.NUM_CLI = clients.NUM_CLI where TYPE_DEM='$type' and ARRONDISS_DEM = '$arrondissement'  ");
        $queryprop->execute();
        return $queryprop->fetchALL();
    }

    public function deletedemandeappart($id,$id_appart)
    {
        require "db_update.php";

        $queryprop = $rex->prepare("DELETE FROM demandes_tj where NUM_DEM = $id and NUMAPPART = $id_appart");
        $queryprop->execute();
        if($queryprop->execute()==True){
            echo "<p>Demande refuser</p>";
        }else{
            echo "<p>Une erreur est survenu</p>";
        }
    }

    public function accepterdemandeappart($id)
    {
        require "db_update.php";

        $queryprop = $rex->prepare("Update demandes set Statue = 'Accepter' where NUM_DEM = '$id'");
        $queryprop->execute();
        if($queryprop->execute()==True){
            echo "<p>Demande accepter</p>";
        }else{
            echo "<p>Une erreur est survenu</p>";
        }
    }

    public function deletedemandetj($id,$id_appart)
    {
        require "db_update.php";

        $queryprop = $rex->prepare("DELETE FROM demandes_tj where NUM_DEM = $id and NUMAPPART not in ($id_appart)");
        $queryprop->execute();
    }

    public function getdemandeapparttj($id)
    {
        require "db_select.php";

        $queryprop = $rex->prepare("SELECT * FROM demandes join demandes_tj on demandes.NUM_DEM = demandes_tj.NUM_DEM join clients on demandes.NUM_CLI = clients.NUM_CLI where NUMAPPART='$id'");
        $queryprop->execute();
        return $queryprop->fetchALL();
    }

    

}
 ?>
