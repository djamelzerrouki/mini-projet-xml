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

<h3>Ajouter un emploi </h3>

<div>
  <form action="/action_page.php">
  <!--
      <label for="jour">Jour:</label>
    <input type="date" id="jour" name="jour" placeholder="jour...">
 --> 
      
<label for="jour">Jour</label>
    <select id="jour" name="jour">
      <option value="1">Dimanche</option>
      <option value="2">Lundi</option>
      <option value="3">Mardi</option>
      <option value="4">Mercredi</option>
      <option value="5">Jeudi</option>

    </select>
    <label for="debut">Heure de debut  :</label>
    <input type="time" id="debut" name="debut" placeholder="Heure de debut  ...">

      
          <label for="debut">Heure de fin  :</label>
    <input type="time" id="fin" name="fin" placeholder="Heure de fin  ...">
      
    <label for="prof">Prof</label>
    <select id="prof" name="prof">
      <option value="1">djamel</option>
      <option value="2">nadiya</option>
      <option value="3">nasima</option>
      <option value="4">khadija</option>
      <option value="5">iman</option>

    </select>
      
         <label for="module">Module</label>
    <select id="module" name="module">
      <option value="1">GL</option>
      <option value="2">sma</option>
      <option value="3">aljebr</option>
      <option value="4">algorithm</option>
      <option value="5">java EE</option>

    </select>
    
         
    <input type="submit" value="Ajouter">
  </form>
</div>

</body>
</html>



