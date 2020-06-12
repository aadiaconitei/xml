<?php 
function hello($someone) { 
   return " Hello " . $someone . "! - With WSDL";
} 
   ini_set("soap.wsdl_cache_enabled", "0"); 
   $server = new SoapServer("http://localhost/soaptest/soap.wsdl",
      array('soap_version' => SOAP_1_2));
   $server->addFunction("hello"); 
   $server->handle(); 
?>