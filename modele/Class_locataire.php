<?php

class Locataires {
    private $NOM_LOC;
    private $PRENOM_LOC;
    private $DATENAISS;
    private $TEL_LOC;
    private $R_I_B;
    private $TEL_BANQUE;
    private $NUMAPPART;

    // Constructeur
    public function __construct() {

    }

    public function setlocataire($NOM_LOC, $PRENOM_LOC, $DATENAISS, $TEL_LOC, $R_I_B, $TEL_BANQUE, $NUMAPPART) {
        $this->NOM_LOC = $NOM_LOC;
        $this->PRENOM_LOC = $PRENOM_LOC;
        $this->DATENAISS = $DATENAISS;
        $this->TEL_LOC = $TEL_LOC;
        $this->R_I_B = $R_I_B;
        $this->TEL_BANQUE = $TEL_BANQUE;
        $this->NUMAPPART = $NUMAPPART;
    }
    public function addlocataire()
    {
    require "db_insert.php";

    $query = "INSERT INTO locataires (NOM_LOC, PRENOM_LOC, DATENAISS, TEL_LOC, R_I_B, TEL_BANQUE, NUMAPPART) VALUES (:NOM_LOC, :PRENOM_LOC, :DATENAISS, :TEL_LOC, :R_I_B, :TEL_BANQUE, :NUMAPPART)";
        $statement = $rex_insert->prepare($query);
        $statement->bindValue(':NOM_LOC', $this->NOM_LOC);
        $statement->bindValue(':PRENOM_LOC', $this->PRENOM_LOC);
        $statement->bindValue(':DATENAISS', $this->DATENAISS);
        $statement->bindValue(':TEL_LOC', $this->TEL_LOC);
        $statement->bindValue(':R_I_B', $this->R_I_B);
        $statement->bindValue(':TEL_BANQUE', $this->TEL_BANQUE);
        $statement->bindValue(':NUMAPPART', $this->NUMAPPART);
        if($statement->execute()){
            echo "Locataire ajouté";
        }else{
            echo "Probleme survenu";
        }
    }
    public function getlocataire($id)
    {
        require "db_select.php";

        $queryprop = $rex->prepare("SELECT * FROM locataires join appartements on locataires.NUMAPPART = appartements.NUMAPPART where locataires.NUMAPPART = $id");
        $queryprop->execute();
    return $queryprop->fetchALL();
    }
    public function getvosappart($id)
    {
        require "db_select.php";
        $queryprop = $rex->prepare("SELECT * FROM locataires JOIN proprietaires ON proprietaires.NUMEROPROP = appartements.NUMEROPROP WHERE LOGINpro = :login_pro");
        $queryprop->bindParam(':login_pro', $id);
        $queryprop->execute();
		return $queryprop->fetchAll();
    }
    public function deletelocataire($id)
    {
        require "db_update.php";

        $queryprop = $rex->prepare("DELETE FROM locataires where NUMAPPART = $id");
        $queryprop->execute();
        if($queryprop->execute()==True){
            echo "<p>Locataire supprimer avec succès</p>";
        }else{
            echo "<p>Une erreur est survenu</p>";
        }
    }
    public function updateloca($id,$colonne,$new)
    {
        require "db_update.php";

        $queryprop = $rex->prepare("Update locataires set $colonne = '$new' where NUMAPPART = '$id'");
        $queryprop->execute();
        return $queryprop->fetch();
    }
    


}

?>
