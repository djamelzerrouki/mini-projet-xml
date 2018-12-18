<!DOCTYPE html>
<html>
<style>
input[type=text],input[type=date],input[type=time], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
} 

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 50px;
  background-color: #f2f2f2;
  padding: 50px;
}
</style>
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
   // txt = "";
  var x = xmlDoc.getElementsByTagName('seance');
    // txt += x[1].getAttribute("jour");
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
<table id="table"></table>
<div id="d"></div>
<button type="button" onclick="loadDoc()">Ajouter Emploi </button>
<h3>Ajouter un emploi </h3>

<div>
   <!--
      <label for="jour">Jour:</label>
    <input type="date" id="jour" name="jour" placeholder="jour...">
 --> 
<form method="get" action="Q010.php"  onsubmit="return loadDoc();">
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
      <option value="djamel">djamel</option>
      <option value="nadiya">nadiya</option>
      <option value="nassima">nassima</option>
      <option value="khadija">khadija</option>
      <option value="imane">imane</option>

    </select>
      
         <label for="module">Module</label>
    <select type="text" id="module" name="module">
      <option  value="GL">GL</option>
      <option value="sma">sma</option>
       <option value="algorithm">algorithm</option>
      <option value="java EE">java EE</option>

    </select>
    
       <label for="salle">Salle</label>
    <select  id="salle" name="salle">
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>

    </select>
         
    <input type="submit" value="Ajouter"  onclick="return  loadDoc();" >
 </form>

    </div>

    <form method="post" action="submit.php" name="requestDetailsForm">

    <label>Organization Name:</label>
    <select id="org_name" name="org_name">
        <option value="Organization 1.abc">Organization 1</option>
        <option value="Organization 2.def">Organization 2</option>
    </select>
    <input type='hidden' name='option_text'value='' >
    <input type="Submit" value="Submit">
</form>

<script type="text/javascript">
    $('form').on('submit', function(e){
        e.preventDefault();
        var text = $('#org_name').find(":selected").text();
        $('input[name="option_text"]').val(text);
        $('form').submit();
    });
</script>
    
</body>
</html>



