 <?php   
     $dom = new DOMDocument();
     $dom->load('emploi.xml'); 
	 $seance = $dom->createElement('seance');
     $seance->setAttribute('jour', 'imen');
	 $seance->setAttribute('debut', 'sqj');
	 $seance->setAttribute('fin', 'nnk');
	 $seance->setAttribute('prof', 'lk');
	 $seance->setAttribute('module', 'kjlv');
	 $seance->setAttribute('salle', 'nlkn');
	 
     $dom->documentElement->appendChild($seance);
 
     $dom->save('emploi.xml');
    
?> 
