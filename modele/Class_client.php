<?php
class Client {
    private $numCli;
    private $prenomCli;
    private $adresseCli;
    private $codeVilleCli;
    private $nomCli;
    private $telCli;
    private $villeCli;
    private $login;
    private $mdp;

    // Constructeur
    public function __construct() {

    }
	

public function inscription() {
    require "db_select.php";
    require "db_insert.php";
							
                                    if($rex->query("SELECT * FROM Clients WHERE LOGIN='$this->login'")->rowCount()!=0){//si mysqli_num_rows retourne pas 0
                                        echo "Ce pseudo est déjà utilisé par un autre membre, veuillez en choisir un autre svp.";
                                    } else {
                                        $Mdp=hash('sha256', $this->mdp);
                                        //insertion du membre dans la base de données:
										$sql = "INSERT INTO Clients (`PRENOM_CLI`, `ADRESSE_CLI`, `CODEVILLE_CLI`, `NOM_CLI`, `VILLE_CLI`, `TEL_CLI`, `LOGIN`, `MDP`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                                        if( $rex_insert->prepare($sql)->execute([$this->prenomCli, $this->adresseCli, $this->codeVilleCli, $this->nomCli, $this->telCli, $this->villeCli, $this->login, $Mdp])){
                                            echo "Inscrit avec succès! Vous pouvez vous connecter: <a href='../index.php?action=connexion'>Cliquez ici</a>.";
                                            $TraitementFini=true;//pour cacher le formulaire
                                        } else {
                                            echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
                                            //echo "<br>Erreur retournée: ".mysqli_error($mysqli);
		}
	}
}

public function verifadmin($Login) {
   
    require "db_select.php";
    if($rex->query("SELECT * FROM Clients WHERE LOGIN='$Login' and Admin=1")->rowCount()!=0){
        $_SESSION['admin'] = 1;
    }

}
public function connexion($Login, $Mdp) {
   
    require "db_select.php";
		$Mdp=hash('sha256', $Mdp);
if($rex->query("SELECT * FROM Clients WHERE LOGIN='$Login' AND MDP='$Mdp'")->rowCount()!=1){
	echo "Pseudo ou mot de passe incorrect.";
                        } else {
                            //pseudo et mot de passe sont trouvé sur une même colonne, on ouvre une session:
                            $_SESSION['pseudo']=$Login;
                            echo "Vous êtes connecté avec succès $Login! Vous pouvez accéder à l'espace rapport en.";
                            $TraitementFini=true;//pour cacher le formulaire
                        }
    }
    public function get_infovisiteur($prenomCli, $adresseCli, $codeVilleCli, $nomCli, $telCli, $villeCli, $login, $mdp)
	{
        $this->prenomCli = $prenomCli;
        $this->adresseCli = $adresseCli;
        $this->codeVilleCli = $codeVilleCli;
        $this->nomCli = $nomCli;
        $this->telCli = $telCli;
        $this->villeCli = $villeCli;
        $this->login = $login;
        $this->mdp = $mdp;

	}
    public function getcilent($id)
    {
        require "db_select.php";

        $queryprop = $rex->prepare("SELECT * FROM clients where LOGIN = '$id'");
        $queryprop->execute();
        return $queryprop->fetch();
    }
    public function updatecilent($id,$colonne,$new)
    {
        require "db_update.php";

        $queryprop = $rex->prepare("Update clients set $colonne = '$new' where LOGIN = '$id'");
        $queryprop->execute();
        return $queryprop->fetch();
    }
    public function checkmdp($id,$Mdp)
    {
        require "db_select.php";

        if($rex->query("SELECT * FROM Clients WHERE LOGIN='$id' AND MDP='$Mdp'")->rowCount()==1){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function updatemdp($id,$new)
    {
        require "db_update.php";

        $queryprop = $rex->prepare("Update clients set MDP = '$new' where LOGIN = '$id'");
        $queryprop->execute();
        return $queryprop->fetch();
    }
    public function idclient($id)
    {
        require "db_select.php";

        $queryprop = $rex->prepare("SELECT NUM_CLI FROM Clients WHERE LOGIN='$id'");
        $queryprop->execute();
        return $queryprop->fetch();
    }
    public function deleteclient($id)
    {
        require "db_update.php";

        $queryprop = $rex->prepare("DELETE FROM Clients where LOGIN='$id'");
        $queryprop->execute();
        if($queryprop->execute()==True){
            echo "<p>Compte supprimer avec succès</p>";
        }else{
            echo "<p>Une erreur est survenu</p>";
        }

    }
    public function getAllcilent()
    {
        require "db_select.php";

        $queryprop = $rex->prepare("SELECT * FROM clients");
        $queryprop->execute();
        return $queryprop->fetch();
    }
}
 ?>
