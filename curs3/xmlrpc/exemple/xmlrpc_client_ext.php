<?php

$xml = xmlrpc_encode_request("add", [$p1 = mt_rand(1, 10), $p2 = mt_rand(1, 10)]);

echo "Requesting $p1 + $p2", PHP_EOL, PHP_EOL;

$context = stream_context_create(['http' => [
    'method' => 'POST',
    'header' => ['Content-Type: text/xml'],
    'content' => $xml,
]]);

$url = 'http://localhost/xml/curs3/xmlrpc/exemple/xmlrpc_server_ext.php';
$result = file_get_contents($url, false, $context);

echo "Server response:", PHP_EOL, PHP_EOL;
echo $result;