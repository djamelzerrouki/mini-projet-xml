 <?php
$mysqli = new mysqli("localhost", "root", "root", "departemant");
if($mysqli->connect_error) {
  exit('Could not connect');
}

 
$sql = "SELECT nom_speci, niveau, jour, heure_debut, heure_fin, nom_mod, nom_ens, nom_salle
 from cours,modules,salles,enseignant,`spécialité`,promotion
 WHERE cours.id_mod=modules.id_mod and enseignant.id_ens=cours.id_ens and 
 salles.id_salle=cours.id_salle  and `spécialité`.id_speci=promotion.id_speci and
 cours.id_promo =promotion.id_promo and cours.id_promo =?";
 

$stmt = $mysqli->prepare($sql);
 $stmt->bind_param("i", $_GET['id_promo']);
$stmt->execute();
$stmt->store_result();
/* Insertion de la variable */
$stmt->bind_result($nom_speci,$niveau,$jour, $heure_debut,$heure_fin ,$nom_ens ,$nom_mod,$nom_salle);
     
   /* Récupération des valeurs */

   $filePath = 'emploi.xml';
   $dom     = new DOMDocument('1.0', 'utf-8'); 
     $stmt->fetch();
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
 
?> 