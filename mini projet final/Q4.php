<!DOCTYPE html>
<html>
<head>
	<title></title>

      <link rel="stylesheet" href="css/style.css">
</head>

<body>

<h1> Afficher les etudiant et les modulesde chaque promotion</h1>

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

<div id="table_emploi"></div>

</body>
</html>