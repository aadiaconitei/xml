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

$doc->getElementsByTagName('nume')->item(0)->nodeValue = 'Python';

// altă modalitate
// $root = $doc->documentElement;
// $root->firstChild->firstChild->nodeValue = 'Python';

// adăugare de text
// $doc->getElementsByTagName('nume')->item(0)->firstChild->appendData(' (limbajul meu preferat)');

echo $doc->saveXML();

