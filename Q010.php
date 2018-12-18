 <?php  
//Q010.php?jour=1&debut=&fin=&prof=1&module=1
$jour = intval($_GET['jour']);
$debut = intval($_GET['debut']);
$fin = intval($_GET['fin']);
$prof = intval($_GET['prof']);
$module = intval($_GET['module']);
$salle = intval($_GET['salle']);
 

     $dom = new DOMDocument();
     $dom->load('newfile.xml'); 
	 $seance = $dom->createElement('seance');
     $seance->setAttribute('jour', $jour);
	 $seance->setAttribute('heure_debut', $debut);
	 $seance->setAttribute('heure_fin', $fin);
	 $seance->setAttribute('nom_ens', $prof);
	 $seance->setAttribute('nom_mod', $module);
	 $seance->setAttribute('nom_salle', $module);
	 
     $dom->documentElement->appendChild($seance);
 
     $dom->save('newfile.xml');
 
?> 
