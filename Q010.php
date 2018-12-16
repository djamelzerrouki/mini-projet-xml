<?php


$file = 'newfile2.xml';

$xml = simplexml_load_file($file);

$galleries = $xml->galleries;

$gallery = $galleries->addChild('gallery');
$gallery->addChild('name', 'a gallery');
$gallery->addChild('filepath', 'path/to/gallery');
$gallery->addChild('thumb', 'mythumb.jpg');

$xml->asXML($file);
?>