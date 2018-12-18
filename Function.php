<!DOCTYPE html>
<html>
<body>
<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		 
      myFunction(this);
    }
  };
  xhttp.open("GET", "newfile.xml", true);
  xhttp.send();
}
 function myFunction(xml) {
  var i ,txt ;
  var xmlDoc = xml.responseXML;
  var table="<tr><th>jour</th><th>debut</th><th>fin</th><th>prof</th><th>module</th><th>salle</th></tr>";
   
  var x = xmlDoc.getElementsByTagName('seance');
    
    for (i = 0; i < x.length; i++) {
    table += "<tr><td>" +
	x[i].getAttribute("jour") +"</td>";
	table += "<td>" +
	x[i].getAttribute("debut") +"</td>";
	table += "<td>" +
	x[i].getAttribute("fin") +"</td>";
	table += "<td>" +
	x[i].getAttribute("prof") +"</td>";
	table += "<td>" +
	x[i].getAttribute("module") +"</td>";
	table += "<td>" +
	x[i].getAttribute("salle") +"</td></tr>";
   
  }
  document.getElementById("table").innerHTML = table;
  
}
</script>
<?php
 $mysqli = new mysqli("localhost", "root", "root", "departemant");
if($mysqli->connect_error) {
  exit('Could not connect');
}
$sql2 =  "SELECT nom_salle from salles";
$sql = "SELECT nom_ens from enseignant";
$sql1 = "SELECT nom_mod from modules";
 
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$stmt->store_result();
$stmt1 = $mysqli->prepare($sql1);
$stmt1->execute();
$stmt1->store_result();
$stmt2 = $mysqli->prepare($sql2);
$stmt2->execute();
$stmt2->store_result();
/* Insertion de la variable */
$stmt->bind_result($nom_ens);
$stmt1->bind_result($nom_mod);
$stmt2->bind_result($nom_salle);
     ?>
<h3>Ajouter un emploi </h3>

<div>
  <form action="">
      
<label for="jour">Jour</label>
    <select id="jour" name="jour">
      <option value="Dimanche">Dimanche</option>
      <option value="Lundi">Lundi</option>
      <option value="Mardi">Mardi</option>
      <option value="Mercredi">Mercredi</option>
      <option value="Jeudi">Jeudi</option>

    </select>
    <label for="debut">Heure de debut  :</label>
    <input type="time" id="debut" name="debut" placeholder="Heure de debut  ...">

      
          <label for="debut">Heure de fin  :</label>
    <input type="time" id="fin" name="fin" placeholder="Heure de fin  ...">
      
    <label for="prof">Prof</label>
    <select id="prof" name="prof">
	<option value= ""></option>
   <?php /* Récupération des valeurs */
   while ($stmt->fetch()) { 
		
   echo "<option value= ".$nom_ens.">"  .$nom_ens. "</option>";}
	?>

    </select>
      
         <label for="module">Module</label>
    <select id="module" name="module">
      <option value= ""></option> 
   <?php /* Récupération des valeurs */
   while ($stmt1->fetch()) {
		
   echo "<option value= ".$nom_mod.">"  .$nom_mod . "</option>";}
	?>

    </select>
	<label for="salle">Salle</label>
    <select id="salle" name="salle">
      <option value= ""></option>
   <?php /* Récupération des valeurs */
   while ($stmt2->fetch()) {
		
   echo "<option value= ".$nom_salle.">"  .$nom_salle. "</option>";}
	?>
    </select>
    
         
    <input type="submit" value="Ajouter" onClick="loadDoc()">
  </form>
</div>
<?php   
     
    $jour= $_GET['jour'];
	$heure_debut= $_GET['debut'];
	$heure_fin= $_GET['fin'];
	$nom_ens= $_GET['prof'];
	$nom_mod = $_GET['module'];
	$nom_salle = $_GET['salle'];
     $dom = new DOMDocument();
     $dom->load('newfile.xml'); 
	 $seance = $dom->createElement('seance');
     $seance->setAttribute('jour', $jour);
	 $seance->setAttribute('debut', $heure_debut);
	 $seance->setAttribute('fin', $heure_fin);
	 $seance->setAttribute('prof', $nom_ens);
	 $seance->setAttribute('module', $nom_mod);
	 $seance->setAttribute('salle', $nom_salle);
	 
     $dom->documentElement->appendChild($seance);
 
     $dom->save('newfile.xml');
    
?> 
<table id="table"></table>
</body>
</html>