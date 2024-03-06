
<html>
<head> 


<!-- table de caractères FR avec accents et ç -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- lien vers la feuille de style -->
<link href="../style.css" type="text/css" rel="stylesheet"> 
</head>
<body class=autre>

<?php
include ("..\controleur\c_demande.php");
include ('v_hautpage.php');
?>


<br>
        


            
<div class=fond>
<div class=centre>
            <br>
            <p>Remplissez le formulaire ci-dessous pour ajouté une demande d'appartement:</p>
            <form method="post" action="v_demande.php">

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

<p>Type d'appartement :</p><select name="typeappart" class='champs'>
    <option value="Studio">Studio</option>
    <option value="Appartement une chambre (T1)">Appartement une chambre (T1)</option>
    <option value="Appartement deux chambres (T2)">Appartement deux chambres (T2)</option>
    <option value="Appartement trois chambres (T3)">Appartement trois chambres (T3)</option>
    <option value="Duplex">Duplex</option>
    <option value="Penthouse">Penthouse</option>
    <option value="Loft">Loft</option>
    <option value="Appartement meublé">Appartement meublé</option>
</select><br>
                <div class=form>
</div>
<div class=form>
  <label>
    Veuillez saisir une date limite:
    <input type="date" name="datelimite" class='champs'>
  </label>
  </div>
  
                <input class='champs' type="submit" name="valider" value="Publier la demande" class="registerbtn" >
            </form>
 </div>
 </div>

            <?php
        
        ?>

</body>