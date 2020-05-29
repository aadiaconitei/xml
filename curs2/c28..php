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

foreach ($root as $e) {
    $limbaj = (string)$e->nume;
    if (strtolower($limbaj) === 'java') {
        $e->addAttribute('tip', 'compilat');
    } else {
        $e->addAttribute('tip', 'interpretat');        
    }
}

echo $root->asXML(), PHP_EOL;