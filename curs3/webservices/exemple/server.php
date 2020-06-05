<?php

echo "Gazda: ", $_SERVER['HTTP_HOST'], PHP_EOL;
echo "URL: ", $_SERVER['REQUEST_URI'], PHP_EOL;
echo "Metoda cererii: ", $_SERVER['REQUEST_METHOD'], PHP_EOL;

echo "Parametrii cererii: ", var_export($_GET, true), PHP_EOL;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $corp = file_get_contents("php://input");
    echo "Corpul cererii: ", PHP_EOL;
    echo $corp, PHP_EOL;

        $vars = [];
        parse_str($corp, $vars);

    echo "Valori trimise serverului prin POST: ", var_export($vars, true), PHP_EOL;
}