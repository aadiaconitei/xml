<?php

$request = <<<XML
<?xml version="1.0" encoding="UTF-8"?>

<methodCall>
    <methodName>add</methodName>
    <params>
        <param>
            <value>
                <int>%d</int>
            </value>
        </param>
        <param>
            <value>
                <int>%d</int>
            </value>
        </param>
    </params>
</methodCall>
XML;

$param1 = mt_rand(1, 10);
$param2 = mt_rand(1, 10);

echo "Requesting $param1 + $param2", PHP_EOL, PHP_EOL;

$request = sprintf($request, $param1, $param2);

$context = stream_context_create(['http' => [
    'method' => 'POST',
    'header' => [
        'Host: localhost',
        'User-Agent: CustomPHPXMLRPC/1.0',
        'Content-Type: text/xml',
        'Content-Length: ' . strlen($request),
    ],
    'content' => $request,
]]);

$url = 'http://localhost/xml/curs3/xmlrpc/exemple/xmlrpc_server_custom.php';
$result = file_get_contents($url, false, $context);

echo "Server response:", PHP_EOL, PHP_EOL;
echo $result;