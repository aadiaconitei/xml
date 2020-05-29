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

$doc->save('limbaje2.xml');
