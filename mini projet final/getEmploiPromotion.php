 <?php 
 $mysqli = new mysqli("localhost", "root", "root", "departemant");
if($mysqli->connect_error) {
  exit('Could not connect'.$mysqli->connect_error);
}  
$sql = "SELECT nom_speci, niveau, jour, heure_debut, heure_fin, nom_ens, nom_mod, nom_salle
 from cours,modules,salles,enseignant,specialite s,promotion
 WHERE cours.id_mod=modules.id_mod and enseignant.id_ens=cours.id_ens and 
 salles.id_salle=cours.id_salle  and s.id_speci=promotion.id_speci and
 cours.id_promo =promotion.id_promo and cours.id_promo =?";
 

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $_GET['id_promo']);
$stmt->execute();
$stmt->store_result();
/* Insertion de la variable */
$stmt->bind_result($nom_speci,$niveau,$jour, $heure_debut,$heure_fin ,$nom_ens ,$nom_mod,$nom_salle);
    /* Récupération des valeurs */ 
echo "<table>";
echo "<tr>";
echo "<th>jour</th>";
echo "<th>debut</th>";
echo "<th>fin</th>";
echo "<th>prof</th>";
echo "<th>module</th>";
echo "<th>salle</th>";
echo "</tr>";
    while ($stmt->fetch()) {
		
echo "<tr>";
     
	  echo "<td>" . $jour . "</td>";
	  echo "<td>" . $heure_debut . "</td>";
	  echo "<td>" . $heure_fin . "</td>";
	  echo "<td>" . $nom_ens . "</td>";
	  echo "<td>" . $nom_mod . "</td>";
	  echo "<td>" . $nom_salle . "</td>";
echo "</tr>";
    }

echo "</table>";
$stmt->fetch();
$stmt->close();
?> 
