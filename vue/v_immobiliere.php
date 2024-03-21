
<html>
<head> 


<!-- table de caractères FR avec accents et ç -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- lien vers la feuille de style -->
<link href="../style.css" type="text/css" rel="stylesheet"> 
</head>
<body class=autre>

<?php
include ("..\controleur\c_immobiliere.php");
include ('v_hautpage.php');
?>


<br>
        


            
<div class=fond>
<div class=centre>
            <br>
            <p>Remplissez le formulaire ci-dessous pour ajouté un bien immobiliére:</p>
            <form method="post" action="v_immobiliere.php">

			    <input class="champs" type="number" min="0" name="etage" placeholder="etage" required><br>
          <input class="champs" type="text" name="rue" placeholder="Rue" required><br>
          <?php          
echo "<select name='arrondissement' class='champs'>";
$nb = count($arrondissementliste); 	// détermination du nombre de lignes à afficher

for($i=0;$i<$nb;$i++){

	echo "<option value='".$arrondissementliste[$i]['NUMARRONDISS']."'>".$arrondissementliste[$i]['NUMARRONDISS']."</option>";
			// pour passer à la ligne suivante du tableau

 // fin boucle
}
echo "</select>";
?>
                <p>Préavis ? :</p>
                <input type="radio" id="contactChoice1" name="preavis" value="1" required/>
                <label for="contactChoice1">Oui</label>
                <input type="radio" id="contactChoice2" name="preavis" value="0" required/>
                <label for="contactChoice2">Non</label><br>

                <select name="typeappart" class='champs'>
    <option value="Studio">Studio</option>
    <option value="Appartement une chambre (T1)">Appartement une chambre (T1)</option>
    <option value="Appartement deux chambres (T2)">Appartement deux chambres (T2)</option>
    <option value="Appartement trois chambres (T3)">Appartement trois chambres (T3)</option>
    <option value="Duplex">Duplex</option>
    <option value="Penthouse">Penthouse</option>
    <option value="Loft">Loft</option>
    <option value="Appartement meublé">Appartement meublé</option>
</select><br>

                <p>Ascenseur ? :</p>
                <input class="bouton" type="radio" id="ascenseurChoice1" name="ascenseur" value="1" required/>
                <label for="ascenseurChoice1">Oui</label>
                <input type="radio" id="ascenseurChoice2" name="ascenseur" value="0" required/>
                <label for="ascenseurChoice2">Non</label><br>

                <input class='champs' type="text" name="prixloc" placeholder="Prix de la location au mois" required><br>
                
                <input class='champs'type="text" name="prixcharge" placeholder="Prix des charges" required><br>

                <div class=form>
</div>
<div class=form>
  <label>
    Veuillez saisir une date ou vous êtes libre:
    <input class='champs' type="date" name="datelibre">
  </label>
  </div>
  
                <input class='champs' type="submit" name="valider" value="Publier l'appartement" class="registerbtn" >
            </form>
 </div>
 </div>

            <?php
        
        ?>

</body>