<html>
<head>
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>
 <div>
<h3>Selectionner la promotion :</h3>
<form class="">
<select name="users" onchange="showUser(this.value)">
  <option value="">select id prom</option>
  <option value="1">1L</option>
  <option value="2">2L</option>
  <option value="3">3L</option>
  <option value="4">1MGL</option>
  <option value="5">1MRT</option>
  <option value="6">1MGI</option>
  <option value="7">2MGL</option>
  <option value="8">2MRT</option>
  <option value="9">2MGI</option>
   </select>
</form>
     </div>   
<br>

<h1>EMPLOI DU TOMPS :</h1>
<div id="txtHint"><b>Selectionner la promotion ...</b></div>



</body>
</html>