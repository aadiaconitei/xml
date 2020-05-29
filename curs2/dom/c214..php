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

// transferă responsabilitatea tratării erorilor către script
libxml_use_internal_errors(true);

$doc = new DOMDocument();
$doc->loadXML($xml);

if ($doc->schemaValidate('my.xsd')) {
    echo "Documentul este valid", PHP_EOL;
} else {
    echo "Documentul nu este valid", PHP_EOL;
    
    echo PHP_EOL;
    echo "Erorile sunt:", PHP_EOL;
    echo PHP_EOL;

    $errors = libxml_get_errors();

    foreach ($errors as $error) {
        echo trim($error->message), PHP_EOL;
    }
}
