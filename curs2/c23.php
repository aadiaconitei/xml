<?php
// $file = 'my.xml';
// $root = new SimpleXMLElement($file, 0, true);
//var_dump($root);

//sau
$file = 'my.xml';
$root = simplexml_load_file($file);
var_dump($root);