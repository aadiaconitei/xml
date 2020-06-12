<?php
// Encrypted Client
$cli = new SoapClient(null, //nu foloseste WSDL
                      array(
                            'uri' => 'http://localhost/soaptest/',
                            'location' => 'http://localhost/soaptest/server.php',
                            'trace' => true,
                            'encoding'=>'utf-8'
                        ));
$auth = array(
        'user'=>'123456789',
        'password'=>'pass'
        );
$auth= json_encode($auth);

//Metoda 1
$h = new SoapHeader('http://localhost/soaptest/', 'auth', $auth, false, SOAP_ACTOR_NEXT);
$cli->__setSoapHeaders(array($h));
try {
   echo "Accesez serverul \n <br />";
   echo $cli->say();
} catch (Exception $e) {
   echo" Eroare ", $e->getMessage();
}


//Metoada 2 
// $return = $cli->__soapCall("hello",array("world"));
// echo "<pre>";
// echo "\nReturning value of __soapCall() call: ".$return;

// echo "\nDumping request headers:\n" .$cli->__getLastRequestHeaders();

// echo "\nDumping request:\n".$cli->__getLastRequest();

// echo "\nDumping response headers:\n".$cli->__getLastResponseHeaders();

// echo "\nDumping response:\n".$cli->__getLastResponse();