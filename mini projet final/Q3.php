 <?php
$mysqli = new mysqli("localhost", "root", "root", "departemant");
if($mysqli->connect_error) {
  exit('Could not connect');
}


$sql = "SELECT nom_speci, niveau, jour, heure_debut, heure_fin, nom_mod, nom_ens, nom_salle
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
   $filename =$_GET['nom'];
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
echo "<h2>le fichier xml est cr&eacute;er </h2>";
//http://127.0.0.1/mini_projet/createxmlQ3.php?id_promo=2
 
?> 
