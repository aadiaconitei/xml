<?php

$handle = curl_init('http://localhost/xml/curs3/webservices/exemple/server.php');

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

curl_setopt($handle, CURLOPT_POST, 1);
curl_setopt($handle, CURLOPT_POSTFIELDS, $xml);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_HTTPHEADER, ['Content-Type: application/xml']);

$result = curl_exec($handle);

curl_close($handle);

echo $result;