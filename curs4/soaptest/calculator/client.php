<?php
    // client.php
  $options = array(
      'trace' => true
  );
  $client = new SOAPClient('http://localhost/soaptest/calculator/server.php?wsdl', $options);
  var_dump($client->Average(['num1' => 10, 'num2' => 6])->Result);