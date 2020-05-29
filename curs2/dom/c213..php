<?php

$xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>

<!DOCTYPE limbaje SYSTEM "my.dtd">

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

// transferă responsabilitatea tratării erorilor către script
libxml_use_internal_errors(true);

$doc = new DOMDocument();
$doc->loadXML($xml);

if ($doc->validate()) {
    echo "Documentul este valid", PHP_EOL;
} else {
    echo "Documentul nu este valid", PHP_EOL;
}


