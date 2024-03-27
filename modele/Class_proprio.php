<?php
class PROPRIETAIRES{


    // Constructeur
    public function __construct() {

    }
	

public function inscriptionpro($Login) {
    require "db_update.php";
							
                                    if($rex->query("SELECT * FROM Clients WHERE LOGIN='$Login' and PROPRIETAIRES=1")->rowCount()!=0){//si mysqli_num_rows retourne pas 0
                                        echo "Ce pseudo est déjà utilisé par un autre membre, veuillez en choisir un autre svp.";
                                    } else {
										$recupCLI = $rex->prepare("SELECT * FROM Clients WHERE LOGIN='$Login'");
										$recupCLI->execute();
										$recup = $recupCLI->fetchALL();
										$sql = $rex->prepare("Update Clients set PROPRIETAIRES = 1 where LOGIN = '$Login'");
                                        if($sql->execute()){
                                            echo "Inscrit avec succès!";
                                            $_SESSION['proprio'] = 1;
                                            $TraitementFini=true;//pour cacher le formulaire
                                        } else {
                                            echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
                                            //echo "<br>Erreur retournée: ".mysqli_error($mysqli);
		}
	}
}


public function verifpro($Login) {
   
    require "db_select.php";
    if($rex->query("SELECT * FROM Clients WHERE LOGIN='$Login' and PROPRIETAIRES=1")->rowCount()!=0){
        $_SESSION['proprio'] = 1;
        $queryprop = $rex->prepare("SELECT NUM_CLI FROM Clients WHERE LOGIN='$Login'");
        $queryprop->execute();
        $_SESSION['proprionum']=$queryprop->fetch();
    }

    }

    public function getAllpro()
    {
        require "db_select.php";

        $queryprop = $rex->prepare("SELECT * FROM clients where PROPRIETAIRES = 1");
        $queryprop->execute();
        return $queryprop->fetchAll();
    }

}
 ?>
