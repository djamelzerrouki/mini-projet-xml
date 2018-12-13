<?php 


$q = intval($_GET['q']);
 

if(!$dbconnect = mysql_connect('localhost', 'root', 'root')) {
   echo "Connection failed to the host 'localhost'.";
   exit;
} // if
if (!mysql_select_db('departemant')) {
   echo "Cannot connect to database 'test'";
   exit;
} // if

$table_id = 'seance';
 
/*
cours.jour, cours.heure_debut,cours.heure_fin ,modules.nom_mod,enseignant.nom_ens,salles.nom_salle 
 
*/

$query = "SELECT jour, heure_debut,heure_fin,nom_ens ,nom_mod,nom_salle  
from cours , modules , salles , enseignant ,  promotion
WHERE
  cours.id_mod=modules.id_mod and   enseignant.id_ens=cours.id_ens and  
  salles.id_salle=cours.id_salle  and   cours.id_promo=promotion.id_promo
and cours.id_promo ='".$q."'";
 
$dbresult = mysql_query($query, $dbconnect);
// create a new XML document

$doc = new DomDocument('1.0');

// create root node
$root = $doc->createElement('emploi');
$root->setAttribute('promotion', $q);

$root = $doc->appendChild($root);

// process one row at a time
while($row = mysql_fetch_assoc($dbresult)) {

  // add node for each row
  $occ = $doc->createElement($table_id);
  $occ = $root->appendChild($occ);


  // add a child node for each field
  foreach ($row as $fieldname => $fieldvalue) {
 $occ->setAttribute($fieldname, $fieldvalue);

   /* $child = $doc->createElement( $fieldname);
    $child = $occ->appendChild($child);

    $value = $doc->createTextNode($fieldvalue);
    $value = $child->appendChild($value);*/
  } // foreach
} // while
// get completed xml document
$xml_string = $doc->saveXML();
Header('Content-type: text/xml');
 
echo  $xml_string ;
 
$myfile = fopen("newfile.xml", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $xml_string);
 
fclose($myfile);
 
?> 