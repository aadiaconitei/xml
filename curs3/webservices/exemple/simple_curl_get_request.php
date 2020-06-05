<?php

$handle = curl_init('http://localhost/xml/curs3/webservices/exemple/server.php?a=1&b=2');

curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($handle);

curl_close($handle);

echo $result;