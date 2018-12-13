<html>
<head>
<script>
function showUser2(str) {
    if (str == "") {
        document.getElementById("txtHint2").innerHTML = "";
        return;
    } else {   if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }else if(window.ActiveXObject){//Internet Explorer 
            try {          
                      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");    
                              } 
            catch (e) {         

                          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");   
                     } 
         else {
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
        showUser(this);
    }
}
</script>

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
        xmlhttp.open("GET","livreBD.php?q="+str,true);
        xmlhttp.send();
     }
}
   </script>
</head>
<body>


	<br>


	<h1>Enter le N de AUTEURS</h1>
<form  >
        Config nember: <input type="nember" name="q" id="q" />
        <input type="submit" value="Submit" onclick="showUser(document.getElementById('q').value)" />
    </form>
 
	<br>
	<br>
	<br>
	<textarea rows="4" cols="50">
	<?php

$fp = fopen ("newfile.xml","r");
while ($l=fgets($fp,500)) {
    echo $l."<br />";
}
fclose($fp);
?>


 </textarea>

<div id="txtHint2"><b>Person info will be listed here...</b></div>


</body>
</html>