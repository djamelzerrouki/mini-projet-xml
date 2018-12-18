<?php
$org_name = mysql_escape_string($_POST['org_name']);

$org_name_split = explode('.', $org_name);
$org_name_full = $org_name_split[0];
$org_name_key = $org_name_split[1];

$strSQL = "INSERT INTO Database(org_name_full, org_name_key) VALUES ('$org_name_full', '$org_name_key')"; 
?>