<?php

$xml = <<<XML
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
var_dump($root);
$python = $root->addChild('limbaj');
$python->addChild('nume', 'Python');

echo "Dupa", PHP_EOL;
echo $root->asXML();

var_dump($root);