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
    require "db_inc.php";

    $query = "INSERT INTO appartements (rue, ARRONDISSE, etage, preavis, TYPAPPART, PRIX_LOC, PRIX_CHARG, ascenseur, DATE_LIBRE, NUMEROPROP) VALUES (:rue, :arrondissement, :etage, :preavis, :typAppart, :prixLoc, :prixCharg, :ascenseur, :dateLibre, :numeroProp)";
    $querynum=$rex->prepare("SELECT NUM_CLI FROM Clients WHERE LOGIN='".$_SESSION['pseudo']."'");
    $querynum->execute();
    $num = $querynum->fetch();
    $this->numeroProp = $num[0];
        $statement = $rex->prepare($query);
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
        require "db_inc.php";

        $queryprop = $rex->prepare("SELECT * FROM appartements");
        $queryprop->execute();
		return $queryprop->fetchAll();
    }
    public function getappart($id)
    {
        require "db_inc.php";

        $queryprop = $rex->prepare("SELECT * FROM appartements join Clients on Clients.NUM_CLI = appartements.NUMEROPROP where NUMAPPART = $id");
        $queryprop->execute();
		return $queryprop->fetch();
    }
    public function getvosappart($id)
    {
        require "db_inc.php";
        $queryprop = $rex->prepare("SELECT * FROM appartements JOIN Clients ON Clients.NUM_CLI = appartements.NUMEROPROP WHERE LOGIN = :login_pro");
        $queryprop->bindParam(':login_pro', $id);
        $queryprop->execute();
		return $queryprop->fetchAll();
    }
    public function getappartarrondis($arrondis,$type)
    {
        require "db_inc.php";
        $queryprop = $rex->prepare("SELECT * FROM appartements WHERE ARRONDISSE = :arondiss and TYPAPPART = :type");
        $queryprop->bindParam(':arondiss', $arrondis);
        $queryprop->bindParam(':type', $type);
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
        require "db_inc.php";

        $queryprop = $rex->prepare("DELETE FROM appartements where NUMAPPART = $id");
        $queryprop->execute();
        if($queryprop->execute()==True){
            echo "<p>Appartement supprimer avec succès</p>";
        }else{
            echo "<p>Une erreur est survenu</p>";
        }
    }



}

?>
