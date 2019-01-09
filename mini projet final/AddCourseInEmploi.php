 <?php   
    
    $jour= $_GET['jour'];
	$heure_debut= $_GET['debut'];
	$heure_fin= $_GET['fin'];
	$nom_ens= $_GET['prof'];
	$nom_mod = $_GET['module'];
	$nom_salle = $_GET['salle'];

     $dom = new DOMDocument();
// load data for file emploi.xml 
	 $dom->load('emploi.xml'); 
// add in to file emploi.xml 
	 $seance = $dom->createElement('seance');

     $seance->setAttribute('jour', $jour);
	 $seance->setAttribute('debut', $heure_debut);
	 $seance->setAttribute('fin', $heure_fin);
	 $seance->setAttribute('prof', $nom_ens);
	 $seance->setAttribute('module', $nom_mod);
	 $seance->setAttribute('salle', $nom_salle);
	 
     $dom->documentElement->appendChild($seance);
     $dom->save('emploi.xml');
    
  
	 ?>

 


    
 

 
 