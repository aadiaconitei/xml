<?php

$xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>

<limbaje>
    <limbaj tip="interpretat">
        <nume>PHP</nume>
    </limbaj>
    <limbaj tip="interpretat">
        <nume>Javascript</nume>
    </limbaj>
    <limbaj tip="compilat">
        <nume>Java</nume>
    </limbaj>
</limbaje>
XML;

$doc = new DOMDocument();
$doc->loadXml($xml);

$lista = $doc->getElementsByTagName('nume');

foreach ($lista as $el) {
    // extrage textul elementului
    $limbaj = $el->nodeValue;
    // extrage valoarea atributului "tip" al elementului părinte
    $tip = $el->parentNode->getAttribute('tip');
    // o altă modalitate
    // $tip = $el->parentNode->attributes->getNamedItem('tip')->nodeValue;    

    echo "$limbaj este un limbaj $tip", PHP_EOL; echo "<br>";
}
