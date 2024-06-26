<?php

class Appartement {
    private $rue;
    private $arrondissement;
    private $etage;
    private $preavis;
    private $typAppart;
    private $prixLoc;
    private $prixCharg;
    private $ascenseur;
    private $dateLibre;
    private $numeroProp;

    // Constructeur
    public function __construct() {

    }

    public function setappart($rue, $arrondissement, $etage, $preavis, $typAppart, $prixLoc, $prixCharg, $ascenseur, $dateLibre) {
        $this->rue = $rue;
        $this->arrondissement = $arrondissement;
        $this->etage = $etage;
        $this->preavis = $preavis;
        $this->typAppart = $typAppart;
        $this->prixLoc = $prixLoc;
        $this->prixCharg = $prixCharg;
        $this->ascenseur = $ascenseur;
        $this->dateLibre = $dateLibre;
    }
    public function addappart()
    {
    require "db_select.php";
    require "db_insert.php";

    $query = "INSERT INTO appartements (rue, ARRONDISSE, etage, preavis, TYPAPPART, PRIX_LOC, PRIX_CHARG, ascenseur, DATE_LIBRE, NUMEROPROP) VALUES (:rue, :arrondissement, :etage, :preavis, :typAppart, :prixLoc, :prixCharg, :ascenseur, :dateLibre, :numeroProp)";
    $querynum=$rex->prepare("SELECT NUM_CLI FROM Clients WHERE LOGIN='".$_SESSION['pseudo']."'");
    $querynum->execute();
    $num = $querynum->fetch();
    $this->numeroProp = $num[0];
        $statement = $rex_insert->prepare($query);
        $statement->bindValue(':rue', $this->rue);
        $statement->bindValue(':arrondissement', $this->arrondissement);
        $statement->bindValue(':etage', $this->etage);
        $statement->bindValue(':preavis', $this->preavis);
        $statement->bindValue(':typAppart', $this->typAppart);
        $statement->bindValue(':prixLoc', $this->prixLoc);
        $statement->bindValue(':prixCharg', $this->prixCharg);
        $statement->bindValue(':ascenseur', $this->ascenseur);
        $statement->bindValue(':dateLibre', $this->dateLibre);
        $statement->bindValue(':numeroProp', $this->numeroProp);
        if($statement->execute()){
            echo "Appartement ajouté";
        }else{
            echo "Probleme survenu";
        }
    }
    public function getallappart()
    {
        require "db_select.php";

        $queryprop = $rex->prepare("SELECT DISTINCT appartements.NUMAPPART,RUE,ARRONDISSE,ETAGE,ASCENSEUR,PRIX_LOC,TYPAPPART,PREAVIS,PRIX_CHARG,DATE_LIBRE FROM appartements JOIN locataires ON appartements.NUMAPPART != locataires.NUMAPPART ");
        if($queryprop->rowCount()==0){
            $queryprop = $rex->prepare("SELECT DISTINCT appartements.NUMAPPART,RUE,ARRONDISSE,ETAGE,ASCENSEUR,PRIX_LOC,TYPAPPART,PREAVIS,PRIX_CHARG,DATE_LIBRE FROM appartements ");
        }
        $queryprop->execute();
		return $queryprop->fetchAll();
    }
    public function getappart($id)
    {
        require "db_select.php";

        $queryprop = $rex->prepare("SELECT * FROM appartements join Clients on Clients.NUM_CLI = appartements.NUMEROPROP where NUMAPPART = $id");
        $queryprop->execute();
		return $queryprop->fetch();
    }
    public function getvosappart($id)
    {
        require "db_select.php";
        $queryprop = $rex->prepare("SELECT * FROM appartements JOIN Clients ON Clients.NUM_CLI = appartements.NUMEROPROP WHERE LOGIN = :login_pro");
        $queryprop->bindParam(':login_pro', $id);
        $queryprop->execute();
		return $queryprop->fetchAll();
    }
    public function getappartdem($num)
    {
        require "db_select.php";
        $queryprop = $rex->prepare("SELECT demandes_tj.NUMAPPART,RUE,ARRONDISSE,ETAGE,ASCENSEUR,PRIX_LOC,TYPAPPART,PREAVIS,PRIX_CHARG,DATE_LIBRE,NUMEROPROP from demandes_tj join appartements on demandes_tj.NUMAPPART = appartements.NUMAPPART JOIN locataires ON appartements.NUMAPPART != locataires.NUMAPPART where demandes_tj.NUM_DEM = :num_dem");
        $queryprop->bindParam(':num_dem', $num);
        $queryprop->execute();
		return $queryprop->fetchAll();
    }
    
    
    public function calculerCotisationsParis($loyer) {
    $totalCotisations = 0;
    $tauxTFPB = 0.0033; // Taux de taxe foncière sur les propriétés bâties
    $tauxTaxeHabitation = 0.2; // Taux de taxe d'habitation 

    // Boucle à travers les loyers des appartements
        // Calcul de la valeur locative cadastrale basée sur le loyer
        $valeurLocativeCadastrale = $loyer * 12; // Exemple de calcul simplifié (12 mois de loyer * 20 pour une estimation de la valeur locative cadastrale)

        // Calcul de la taxe foncière
        $cotisationTFPB = $valeurLocativeCadastrale * $tauxTFPB;

        // Calcul de la taxe d'habitation
        $cotisationTaxeHabitation = $valeurLocativeCadastrale * $tauxTaxeHabitation;

        // Ajout des cotisations au total
        $totalCotisations += $cotisationTFPB + $cotisationTaxeHabitation;

    return $totalCotisations;
}
public function deletelocataire($id)
    {
        require "db_update.php";

        $queryprop = $rex->prepare("DELETE FROM appartements where NUMAPPART = $id");
        $queryprop->execute();
        if($queryprop->execute()==True){
            echo "<p>Appartement supprimer avec succès</p>";
        }else{
            echo "<p>Une erreur est survenu</p>";
        }
    }

    public function getAllappartliste()
    {
        require "db_select.php";
        $queryprop = $rex->prepare("SELECT `NUMAPPART`, `RUE`, `ARRONDISSE`, `ETAGE`, `PREAVIS`, `TYPAPPART`, `PRIX_LOC`, `PRIX_CHARG`, `ASCENSEUR`, `DATE_LIBRE`,NOM_CLI,PRENOM_CLI FROM appartements join Clients on Clients.NUM_CLI = appartements.NUMEROPROP");
        $queryprop->execute();
		return $queryprop->fetchAll();
    }
    public function updateprix($id,$new)
    {
        require "db_update.php";

        $queryprop = $rex->prepare("Update appartements set PRIX_LOC = $new where NUMAPPART = '$id'");
        $queryprop->execute();
        if($queryprop->execute()==True){
            echo "<p>Prix changer avec succès</p>";
        }else{
            echo "<p>Une erreur est survenu</p>";
        }
    }
    
    public function getAllappartcount()
    {
        require "db_select.php";
        $queryprop = $rex->prepare("SELECT count(*) FROM appartements ");
        $queryprop->execute();
		return $queryprop->fetchAll();
    }
    
}

?>
