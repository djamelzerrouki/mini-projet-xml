 <?php
$mysqli = new mysqli("localhost", "root", "root", "departemant");
if($mysqli->connect_error) {
  exit('Could not connect');
}

//  Query 
$sql = "SELECT nom_speci, niveau, jour, heure_debut, heure_fin, nom_mod, nom_ens, nom_salle
 from cours c,modules m,salles sal,enseignant e,specialite s,promotion p
 WHERE c.id_mod=m.id_mod and 
  e.id_ens=c.id_ens and 
  sal.id_salle=c.id_salle and 
  s.id_speci=p.id_speci and 
  c.id_promo =p.id_promo and 
  c.id_promo =?";
 
// prepare stment
$stmt = $mysqli->prepare($sql);
   /* Récupération des valeurs id_promo  */

$stmt->bind_param("i", $_GET['id_promo']);
$stmt->execute();
$stmt->store_result();
/* Insertion de la variable */
$stmt->bind_result($nom_speci,$niveau,$jour, $heure_debut,$heure_fin ,$nom_ens ,$nom_mod,$nom_salle);
     
   /* Récupération des valeurs */
   //$filename =$_GET['nom'];
   $filename ="emploiQ3";
   $filePath = $filename.'.xml';
   $dom     = new DOMDocument('1.0', 'utf-8'); 
   //  $stmt->fetch();
     $prom = ($niveau).($nom_speci) ;
     $emploi = $dom->createElement('emploi');
	 $emploi->setAttribute('promotion',$prom );
  while ($stmt->fetch()) {
$seance = $dom->createElement('seance');
     $seance->setAttribute('jour', $jour);
	 $seance->setAttribute('debut', $heure_debut);
	 $seance->setAttribute('fin', $heure_fin);
	 $seance->setAttribute('prof', $nom_ens);
	 $seance->setAttribute('module', $nom_mod);
	 $seance->setAttribute('salle', $nom_salle);
	 
     $emploi->appendChild($seance); 
    
    }
   $dom->appendChild($emploi); 
   $dom->save($filePath); 
  
$stmt->fetch();
$stmt->close();
echo "<script>alert('le fichier xml est créer' )</script>"; 
echo "<h2>le fichier xml est créer </h2>";
//http://localhost/projects/eclipse-workspacePHP/projct/phbdataBase/mini%20projet%20final/Q3.php?id_promo=1
 
?> 
