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
$doc->formatOutput = true;
$doc->preserveWhiteSpace = false;
$doc->loadXml($xml);

$limbaje = $doc->getElementsByTagName('limbaj');
foreach ($limbaje as $limbaj) {
    $atribut = $doc->createAttribute('tip');

    if (strtolower($limbaj->firstChild->nodeValue) === 'java') {
        $atribut->nodeValue = 'compilat';
    } else {
        $atribut->nodeValue = 'interpretat';
    }

    $limbaj->appendChild($atribut);
}

echo $doc->saveXML();