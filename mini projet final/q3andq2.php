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
  <li><a href="#home">Home</a></li>
    <li><a href="q3andq2.php">valide xml Q3</a></li>
  <li><a href="Q4.php">promotion Q4</a></li>
  <li><a href="Q5.xsl">emploi de temps Q5</a></li>
      <li><a href="q3andq2.php">valide xml Q7</a></li>
  <li><a href="Q9.php">Q9</a></li>
  <li style="float:right"><a class="active" href="#about">About</a></li>
</ul><?php

function libxml_display_error($error)
{
    $return = "<br/>\n";
    switch ($error->level) {
        case LIBXML_ERR_WARNING:
            $return .= "<b>Warning $error->code</b>: ";
            break;
        case LIBXML_ERR_ERROR:
            $return .= "<b>Error $error->code</b>: ";
            break;
        case LIBXML_ERR_FATAL:
            $return .= "<b>Fatal Error $error->code</b>: ";
            break;
    }
    $return .= trim($error->message);
    if ($error->file) {
        $return .=    " in <b>$error->file</b>";
    }
    $return .= " on line <b>$error->line</b>\n";

    return $return;
}

function libxml_display_errors() {
    $errors = libxml_get_errors();
    foreach ($errors as $error) {
        print libxml_display_error($error);
    }
    libxml_clear_errors();
}

// Enable user error handling
libxml_use_internal_errors(true);

$xml = new DOMDocument(); 
$xml->load('emploiQ3.xml'); 

if (!$xml->schemaValidate('Q2.xsd')) {
    print '<b>DOMDocument::schemaValidate() Generated Errors!</b>';
    libxml_display_errors();
}else {
echo "<script>alert('le fichier xml emploiQ3.xml  est valide par Q2.xsd' )</script>"; 

echo "<h1>le fichier xml emploiQ3.xml  est valide par Q2.xsd</h1>"; 
}

?>