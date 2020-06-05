<?php

function sendSuccessResponse($result) {
    $success = <<<XML
<?xml version="1.0" encoding="UTF-8"?>

<methodResponse>
    <params>
        <param>
            <value><int>%d</int></value>
        </param>
    </params>
</methodResponse>
XML;

    $response = sprintf($success, $result);

    header("HTTP 1.1 200 OK");
    header("Content-Type: text/xml");
    header("Content-Length: " . strlen($response));

    echo $response;
    exit;
}

function sendFaultResponse($message) {
    $fault = <<<XML
<?xml version="1.0" encoding="UTF-8"?>

<methodResponse>
    <fault>
        <value>
            <struct>
                <member>
                    <name>faultCode</name>
                    <value><int>-1</int></value>
                </member>
                <member>
                    <name>faultString</name>
                    <value><string>%s</string></value>
                </member>
            </struct>
        </value>
    </fault>
</methodResponse>
XML;

    $response = sprintf($fault, $message);

    header("HTTP 1.1 200 OK");
    header("Content-Type: text/xml");
    header("Content-Length: " . strlen($response));

    echo $response;
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendFaultResponse('Bad request; can only accept POST requests');
}

$request = @file_get_contents("php://input");
if (false === $request) {
    sendFaultResponse('Internal server error; cannot process request');
}

try {
    $root = new SimpleXMLElement($request, LIBXML_NOBLANKS);
} catch (\Exception $e) {
    sendFaultResponse('Bad request; invalid XML');
}

$param1 = (string)$root->params->param[0]->value->int;
$param2 = (string)$root->params->param[1]->value->int;

$result = (int)$param1 + (int)$param2;

sendSuccessResponse($result);


