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

$context = stream_context_create(['http' => [
    'method' => 'POST',
    'header' => ['Content-Type: application/xml'],
    'content' => $xml
]]);

$url = 'http://localhost/xml/curs3/webservices/exemple/server.php';
$result = file_get_contents($url, false, $context);

echo $result;