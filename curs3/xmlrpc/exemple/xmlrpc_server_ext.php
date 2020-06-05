<?php

function add($methodName, $args, $appData) {
    if (!is_array($args) || count($args) !== 2) {
        return ['faultCode' => -1, 'faultString' => 'Invalid number of parameters'];
    }

    $param1 = (int)$args[0];
    $param2 = (int)$args[1];

    return $param1 + $param2;
}

$body = @file_get_contents("php://input");

$server = xmlrpc_server_create();
xmlrpc_server_register_method($server, "add", "add");

echo header('Content-Type: text/xml');
echo xmlrpc_server_call_method($server, $body, []);

exit;

