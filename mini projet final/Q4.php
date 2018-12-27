<!DOCTYPE html>
<html>
<head>
	<title> Q4 afficher l’emploi du temps  </title>

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

<h1> Afficher l’emploi du temps  de chaque promotion</h1>

 <?php
 $mysqli = new mysqli("localhost", "root", "root", "departemant");
if($mysqli->connect_error) {
  exit('Could not connect');
}
$sql = "SELECT nom_speci, niveau,id_promo 
        from specialite s,promotion
            WHERE s.id_speci=promotion.id_speci";
 
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$stmt->store_result();
/* Insertion de la variable */
$stmt->bind_result($nom_speci,$niveau,$id_promo);
     ?>
<div class="center">

<form >
<h2>Choisir la promotion:</h2>   
<select id ="select" name="select" onChange="ChangeValeur(this.value)">
    <option value= ""></option>
   <?php /* Récupération des valeurs */
   while ($stmt->fetch()) {
		$promo=($niveau).($nom_speci);
   echo "<option value= ".$id_promo.">"  .$promo . "</option>";}
	?>
</select>
</form>
 </div>

</br>
</br>
<script >
function  ChangeValeur(str) {
  var xhttp;    
  var nb=Number(str);//parseInt(str);
  document.getElementById("table_emploi").innerHTML = nb;
  if (str == "") {
    document.getElementById("table_emploi").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("table_emploi").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getEmploiPromotion.php?id_promo="+nb, false);
  xhttp.send();
}
</script>

  <div class="center" id="table_emploi"></div>

</body>
</html>