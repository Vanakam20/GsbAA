<?php
class PROPRIETAIRES {
    private $nompro;
    private $prenompro;
    private $adressepro;
    private $codeVillepro;
    private $telpro;
    private $loginpro;

    // Constructeur
    public function __construct() {

    }
	

public function inscription($Login) {
    require "db_inc.php";
							
                                    if($rex->query("SELECT * FROM PROPRIETAIRES WHERE LOGINpro='$Login'")->rowCount()!=0){//si mysqli_num_rows retourne pas 0
                                        echo "Ce pseudo est déjà utilisé par un autre membre, veuillez en choisir un autre svp.";
                                    } else {
										$recupCLI = $rex->prepare("SELECT * FROM Clients WHERE LOGIN='$Login'");
										$recupCLI->execute();
										$recup = $recupCLI->fetchALL();
										$sql = "INSERT INTO PROPRIETAIRES (`NOM`, `PRENOM`, `ADRESSE`, `CODE_VILLE`, `TEL`, `LOGINpro`) VALUES (?, ?, ?, ?, ?, ?)";
                                        if($rex->prepare($sql)->execute([$recup[0]['NOM_CLI'],$recup[0]['PRENOM_CLI'],$recup[0]['ADRESSE_CLI'],$recup[0]['CODEVILLE_CLI'],$recup[0]['TEL_CLI'],$Login])){
                                            echo "Inscrit avec succès!";
                                            $_SESSION['proprio'] = "$Login";
                                            $TraitementFini=true;//pour cacher le formulaire
                                        } else {
                                            echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
                                            //echo "<br>Erreur retournée: ".mysqli_error($mysqli);
		}
	}
}


public function verifpro($Login) {
   
    require "db_inc.php";
    if($rex->query("SELECT * FROM PROPRIETAIRES WHERE LOGINpro='$Login'")->rowCount()!=0){
        $_SESSION['proprio'] = "$Login";
        $queryprop = $rex->prepare("SELECT NUMEROPROP FROM PROPRIETAIRES WHERE LOGINpro='$Login'");
        $queryprop->execute();
        $_SESSION['proprionum']=$queryprop->fetch();
    }

    }
    public function updatepro($id,$colonne,$new)
    {
        require "db_inc.php";

        $queryprop = $rex->prepare("Update PROPRIETAIRES set $colonne = '$new' where LOGINpro = '$id'");
        $queryprop->execute();
        return $queryprop->fetch();
    }

    public function deletepro($id)
    {
        require "db_inc.php";

        $queryprop = $rex->prepare("DELETE FROM PROPRIETAIRES where LOGINpro='$id'");
        $queryprop->execute();
        if($queryprop->execute()==FALSE){
            echo "<p>Une erreur est survenu</p>";
        }

    }


}
 ?>
