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

$root = new SimpleXMLElement($xml);

echo "Inainte", PHP_EOL;
echo $root->asXML(), PHP_EOL;

unset($root->limbaj[0]);

// $root->offsetUnset(0);


echo "Dupa", PHP_EOL;
echo $root->asXML();