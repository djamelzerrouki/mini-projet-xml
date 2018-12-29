 <?php
$mysqli = new mysqli("localhost", "root", "root", "departemant");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT  num_et, nom_et, prenom_et
 from specialite s,promotion,etudiant
 WHERE etudiant.id_promo=promotion.id_promo and 
s.id_speci=promotion.id_speci and
 promotion.id_promo=?";
 
 $sql1 = "SELECT  nom_speci, niveau
 from specialite s,promotion
 WHERE 
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
$stmt1 = $mysqli->prepare($sql1);
$stmt1->bind_param("i", $_GET['id_promo']);
$stmt1->execute();
$stmt1->store_result();
$stmt2 = $mysqli->prepare($sql2);
$stmt2->bind_param("i", $_GET['id_promo']);
$stmt2->execute();
$stmt2->store_result();

/* Insertion de la variable */
$stmt->bind_result($num_et, $nom_et, $prenom_et);
$stmt1->bind_result($nom_speci,$niveau);
$stmt2->bind_result( $id_mod, $nom_mod);

     
   /* Récupération des valeurs */
  $filename ="fileQ7";

    // $filename =$_GET['nom'];
   $filePath = $filename.'.xml';
   
   $dom     = new DOMDocument('1.0', 'utf-8'); 
     $stmt1->fetch();    
     $promotion = $dom->createElement('promotion');
	 $promotion->setAttribute('option',$nom_speci );
	 $promotion->setAttribute('niveau',$niveau );
	 $etudiants = $dom->createElement('etudiants');
	 $modules = $dom->createElement('modules');
	 
  while ($stmt->fetch()) {
		$etudiant = $dom->createElement('etudiant');
		$etudiant->setAttribute('numInscription', $num_et);
        $etudiant->setAttribute('nom', $nom_et);
	    $etudiant->setAttribute('prenom', $prenom_et);
		
    $etudiants->appendChild($etudiant);
	
    }
	while ($stmt2->fetch()) {
		
		$module = $dom->createElement('module');
	    $module->setAttribute('idModule', $id_mod);
	    $module->setAttribute('nomModule', $nom_mod);
  
	$modules->appendChild($module); 
    }
	 
 
   $promotion->appendChild($etudiants);
   $promotion->appendChild($modules);	
   $dom->appendChild($promotion); 
   $dom->save($filePath); 
  
$stmt->fetch();
$stmt->close();
echo "<script>alert('le fichier xml est créer' )</script>"; 
  
?> 
