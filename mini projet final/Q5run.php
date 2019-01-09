<?php
# LOAD XML FILE
$XML = new DOMDocument();
$XML->load('emploi.xml');

# START XSLT
$xslt = new XSLTProcessor();
$XSL = new DOMDocument();
$XSL->load('Q5.xsl');
$xslt->importStylesheet( $XSL );
print $xslt->transformToXML( $XML );
?>