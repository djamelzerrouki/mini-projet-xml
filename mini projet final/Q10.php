<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
<style>
h1 {
  color: white;
  font-family: verdana;
  font-size: 300%;

}
h2  {
  color: white;
  font-family: courier;
  font-size: 160%;
    
}
  select {
  width: 40%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
    
    .center {
  margin: auto;
  width: 50%;
   padding: 10px;
}
</style>
</head>
<body>
<style>
input[type=text], input[type=time],input[type=file], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
} 
 button[name=button] {
       margin:auto;
width: 50%;
   padding: 10px;
  background-color: #5f2c82;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
 }
 

div {
      width: 50%;
  border-radius: 50px;
   padding: 50px;
}
label{
  width: 100%;
   margin: 8px 0;
 color: white;

  display: inline-block;
   box-sizing: border-box;
} 
 
</style>
<script>
function suprimer_val() {
	 document.getElementById("jour" ).value='';
     document.getElementById("module" ).value='';
	 document.getElementById("salle" ).value='';
	 document.getElementById("prof" ).value='';
	 debut = document.getElementById("debut").value='';
	 document.getElementById("fin").value='';
}
function Ajout() {
	
	var select = document.getElementById("jour" );
    var jour = select.options[select.selectedIndex].value;
	var select = document.getElementById("module" );
    var module = select.options[select.selectedIndex].value;
	var select = document.getElementById("salle" );
    var salle = select.options[select.selectedIndex].value;
	var select = document.getElementById("prof" );
    var prof = select.options[select.selectedIndex].value;
	var debut = document.getElementById("debut").value;
	var fin = document.getElementById("fin").value;
   
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
	  loadDoc();
	  suprimer_val();
	  document.getElementById("ii").innerText = "Ajout d'une seance est bien fait" ;
    }
  };
  xhttp.open("GET", "Ajouter_Seance.php?jour="+jour+"&debut="+debut+"&fin="+fin+"&prof="+prof+
                "&module="+module+"&salle="+salle , false);
  xhttp.send();
  
}
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		 
      myFunction(this);
    }
  };
  xhttp.open("GET", "emploi.xml", true);
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

$sql = "SELECT nom_ens from enseignant";
$sql1 = "SELECT nom_mod from modules";
$sql2 =  "SELECT nom_salle from salles";
 
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
  
  </br>
 </br>
 <h1>Emploi du temps </h1>
 </br>
  
 <table id="table" ></table>
  <h2>Ajouter un emploi </h2>
<div class="center">
<form>  
<label for="jour">Jour</label>
    <select id="jour" name="jour">
	  <option value=""></option>
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
    <select id="prof" name="prof" >
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

         
    <button type="button" name="button" onClick="Ajout()">Ajouter</button>
 </form> 
 <div id="ii"></div>
</div>



</body>
</html>