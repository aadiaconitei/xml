<?php

$xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>

<limbaje>
    <limbaj>
        <nume>PHP</nume>
    </limbaj>
    <limbaj>
        <nume>Javascript</nume>
    </limbaj>
    <limbaj>
        <nume>Java</nume>
    </limbaj>
</limbaje>
XML;

$doc = new DOMDocument();
$doc->loadXml($xml);
// înlătură elementele care au doar spații ca și conținut
//$doc->loadXml($xml, LIBXML_NOBLANKS);

$lista = $doc->getElementsByTagName('nume');

foreach ($lista as $el) {
    echo $el->nodeValue, PHP_EOL;
}
