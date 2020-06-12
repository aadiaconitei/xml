<?php
// Authentication Server
class Test{
    public function auth($a){
      $a= json_decode($a, true);
      if($a['user']!= '123456789' || $a['password'] !='pass'){
        Throw new SoapFault ('Server','You have no access');
      }
    }
    function say(){
      return 'Success, you have access!';
    }
    
    
    function hello($someone) { 
        return "Hello 22" . $someone . "! - SOAP 1.2";
     } 
 
}
$srv = new SoapServer(null,
                      array('uri' => 'http://localhost/soaptest',
                                'soap_version' => SOAP_1_2
                      ));
//adaug functionalitatea unei clase
$srv->setClass('Test');

//pot sa adaug doar functionalitatea unei functii
//function hello($someone) { 
//   return "Hello " . $someone . "! - SOAP 1.2";
//}
//$server->addFunction("hello"); 
$srv->handle();