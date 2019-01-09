<?php
# LOAD XML FILE
$XML = new DOMDocument();
$XML->load('fileQ7.xml');

# START XSLT
$xslt = new XSLTProcessor();
$XSL = new DOMDocument();
$XSL->load('Q8.xsl');
$xslt->importStylesheet( $XSL );
print $xslt->transformToXML( $XML );
?>