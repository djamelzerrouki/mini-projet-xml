<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}
</style>
<style>
  * {margin: 0; padding: 0;}
#container {height: 100%; width:100%; font-size: 0;}
#left, #middle, #right {display: inline-block; *display: inline; vertical-align: top; font-size: 12px;}
#left {width: 40%;       background-color: rgba(255, 255, 255, 0.2);
}
#middle {width: 50%;  }
#right {width: 25%; background: yellow;}
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

       background: -webkit-linear-gradient(45deg, #49a09d, #5f2c82);
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
 }
 

div {
      width: 50%;
  border-radius: 10px;
   padding: 10px;
}
label{
  width: 100%;
   margin: 8px 0;
 color: white;

  display: inline-block;
   box-sizing: border-box;
} 
</style>
     
</head>
<body>
    <ul>
  <li><a href="Q10.php">Home</a></li>
    <li><a href="q3andq2.php">valide xml Q3</a></li>
  <li><a href="Q4.php">promotion Q4</a></li>
  <li><a href="Q5run.php">emploi de temps Q5</a></li>
      <li><a href="q3andq2.php">valide xml Q7</a></li>
        <li><a href="Q8run.php">emploi de temps Q8</a></li>
  <li><a href="Q9.php">Q9</a></li>
  <li style="float:right"><a class="active" href="#about">About</a></li>
</ul>
 
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
    var module =select.options[select.selectedIndex].value;
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
	  document.getElementById("text").innerText = "Affichage d' emploi du temps" ;
    }
  };
  xhttp.open("GET", "AddCourseInEmploi.php?jour="+jour+"&debut="+debut+"&fin="+fin+"&prof="+prof+
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
/*SELECT nom_ens from enseignant */
$sql = "SELECT nom_ens from enseignant";
  /* SELECT nom_mod from modules */  
$sql1 = "SELECT nom_mod from modules";
/* SELECT nom_salle from salles */
$sql2 =  "SELECT nom_salle from salles";
 // stmt for sql "enseignant"
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$stmt->store_result();    
 // stmt for sql "modules"
$stmt1 = $mysqli->prepare($sql1);
$stmt1->execute();
$stmt1->store_result();
 // stmt for sql "salles"
$stmt2 = $mysqli->prepare($sql2);
$stmt2->execute();
$stmt2->store_result();
/* Insertion de la variable */
$stmt->bind_result($nom_ens);
$stmt1->bind_result($nom_mod);
$stmt2->bind_result($nom_salle);
    $sql3 = "SELECT nom_speci, niveau,id_promo 
        from specialite s,promotion
            WHERE s.id_speci=promotion.id_speci";
 
$stmt3 = $mysqli->prepare($sql3);
$stmt3->execute();
$stmt3->store_result();
/* Insertion de la variable */
$stmt3->bind_result($nom_speci,$niveau,$id_promo);


     ?>
 
    <h1>Emploi du temps </h1>

 <div >
    <div id="left">
       <h2>Ajouter un emploi </h2>

<form>  
      <label for="promotion">Choisir la promotion</label> 
<select id ="promo" name="promo" ">
   /* Récupération des valeurs */
<?php /* Récupération des valeurs */
   while ($stmt3->fetch()) {
    $promo=($niveau).($nom_speci);
   echo "<option value= ".$id_promo.">"  .$promo . "</option>";}
  ?>
 </select>
<label for="jour">Jour</label>
    <select id="jour" name="jour">
       <option value="Dimanche">Dimanche</option>
      <option value="Lundi">Lundi</option>
      <option value="Mardi">Mardi</option>
      <option value="Mercredi">Mercredi</option>
      <option value="Jeudi">Jeudi</option>

    </select>
    <label for="debut">Heure de debut  :</label>
        <select id="debut" name="debut">
       <option value="08:00:00">08:00:00</option>
      <option value="09:30:00">09:30:00</option>
      <option value="11:00:00">11:00:00</option>
      <option value="14:00:00">14:00:00</option>
      <option value="15:30:00">15:30:00</option>

    </select>
    <!-- 
    <input type="time" id="debut" name="debut" placeholder="Heure de debut  ...">
--> 
      
          <label for="debut">Heure de fin  :</label>
          <select id="fin" name="fin">
       <option value="09:30:00">09:30:00</option>
      <option value="11:00:00">11:00:00</option>
      <option value="12:30:00">12:30:00</option>  
      <option value="15:30:00">15:30:00</option>
      <option value="17:00:00">17:00:00</option>


    </select>
   <!--
    <input type="time" id="fin" name="fin" placeholder="Heure de fin  ...">
      --> 
    <label for="prof">Prof</label>
    <select id="prof" name="prof" >
    <?php /* Récupération des valeurs */
   while ($stmt->fetch()) { 
		
   echo "<option value= ".$nom_ens.">"  .$nom_ens. "</option>";}
	?>

    </select>
      
         <label for="module">Module</label>
    <select id="module" name="module">
    <?php /* Récupération des valeurs */
   while ($stmt1->fetch()) {
		
   echo "<option value= ".$nom_mod.">"  .$nom_mod . "</option>";}
	?>

    </select>
	<label for="salle">Salle</label>
    <select id="salle" name="salle">
    <?php /* Récupération des valeurs */
   while ($stmt2->fetch()) {
		
   echo "<option value= ".$nom_salle.">"  .$nom_salle. "</option>";}
	?>
    </select>

         
    <button type="button" name="button" onClick="Ajout()">Ajouter</button>
 </form> 
      
 </div>
    <div id="middle"><div class="center">
  <h1 id="text"></h1>
     <table id="table" ></table>
         </div></div>
 </div>
</body>
</html>


 