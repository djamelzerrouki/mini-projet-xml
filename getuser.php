<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','root','departemant');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
echo "jimmi :p ! ";
echo "jimmi :p ! ";

mysqli_select_db($con,"ajax_demo");
$query = "SELECT jour, heure_debut,heure_fin,nom_ens ,nom_mod,nom_salle  
from cours , modules , salles , enseignant ,  promotion
WHERE
  cours.id_mod=modules.id_mod and   enseignant.id_ens=cours.id_ens and  
  salles.id_salle=cours.id_salle  and   cours.id_promo=promotion.id_promo
and cours.id_promo ='".$q."'";    
$sql="SELECT *  FROM `livre`  WHERE idauteur = '".$q."'";
$result = mysqli_query($con,$query);

echo "<table>
<tr>
<th>jour</th>
<th>debut</th>
<th>fin</th>
<th>prof</th>
<th>module</th>
<th>salle</th>
 
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row[0] . "</td>";
    echo "<td>" . $row[1] . "</td>";
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "<td>" . $row[4] . "</td>";
    echo "<td>" . $row[5] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>