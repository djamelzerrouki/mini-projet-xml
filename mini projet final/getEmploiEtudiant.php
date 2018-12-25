 <?php 
 $mysqli = new mysqli("localhost", "root", "root", "departemant");
if($mysqli->connect_error) {
  exit('Could not connect'.$mysqli->connect_error);
}  

 $sql = "SELECT  num_et, nom_et, prenom_et
 from specialite s,promotion,etudiant
 WHERE etudiant.id_promo=promotion.id_promo and 
 s.id_speci=promotion.id_speci and
 promotion.id_promo=?";
 
 $sql2 = "SELECT  id_mod, nom_mod
 from specialite s,promotion,modules
 WHERE 
 modules.id_promo=promotion.id_promo and 
 s.id_speci=promotion.id_speci and
 promotion.id_promo=?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $_GET['id_promo']);
$stmt->execute();
$stmt->store_result();
$stmt2 = $mysqli->prepare($sql2);
$stmt2->bind_param("i", $_GET['id_promo']);
$stmt2->execute();
$stmt2->store_result();

/* Insertion de la variable */
$stmt->bind_result($num_et, $nom_et, $prenom_et);
$stmt2->bind_result( $id_mod, $nom_mod);
/* Récupération des valeurs */ 
echo "<h1>Les Etudiants</h1>";
echo "<table>";
echo "<tr>";
echo "<th>numInscription</th>";
echo "<th>nom</th>";
echo "<th>prenom</th>";
echo "</tr>";
    while ($stmt->fetch()) {
		
echo "<tr>";
	  echo "<td>" . $num_et . "</td>";
	  echo "<td>" . $nom_et  . "</td>";
	  echo "<td>" . $prenom_et . "</td>";
echo "</tr>";
    }
echo "</br>";
echo "</br>";
echo "</br>";
echo "</table>";
echo "<h1>Les Modules</h1>";
echo "<table>";
echo "<tr>";
echo "<th>idModule</th>";
echo "<th>nomModule</th>";
echo "</tr>";
    while ($stmt2->fetch()) {
		
echo "<tr>";
	  echo "<td>" . $id_mod . "</td>";
	  echo "<td>" . $nom_mod  . "</td>";
echo "</tr>";
    }

echo "</table>";
$stmt->fetch();
$stmt->close();
?> 
