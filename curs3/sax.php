<?php
   //(Simple API for XML)
   
   $tutors   = array();
   $elements   = null;
   
   //va trata inceputul unui element din document
   //se va apela aceasta functie cand se va deschide tagul
   function startElements($parser, $name, $attrs) {
      global $tutors, $elements;
      
      if(!empty($name)) {
         if ($name == 'COURSE') {
            // creating an array to store information
            $tutors []= array();
         }
         $elements = $name;
      }
   }
   // va trata sfarsitul unui element din document
   // se va apela cand se va inchide tagul
   function endElements($parser, $name) {
      global $elements;
      
      if(!empty($name)) {
         $elements = null;
      }
   }
   
   // va trata textul găsit în document intre tagul de inceput si tagul de sfarsit
   function textHandler($parser, $data) {
      global $tutors, $elements;
      
      if(!empty($data)) {
         if ($elements == 'NAME' || $elements == 'COUNTRY' ||  $elements == 'EMAIL' ||  $elements == 'PHONE') {
            $tutors[count($tutors)-1][$elements] = trim($data);
         }
      }
   }
   
   // pas 2. CREAREA PARSERULUI
   $parser = xml_parser_create(); 
   //pas 3
   //pas 4
   xml_set_element_handler($parser, "startElements", "endElements");
   xml_set_character_data_handler($parser, "textHandler");
   
   // open xml file
   if (!($handle = fopen('sax.xml', "r"))) {
      die("could not open XML input");
   }
   
   while($data = fread($handle, 4096)){ // read xml file 
     // start parsing an xml document 
	if (!xml_parse($parser, $data, feof($handle))) {
		$error = xml_error_string(xml_get_error_code($parser));
		$line = xml_get_current_line_number($parser);
		die(sprintf('XML error: %s at line %d', $error, $line));
	}
   }
   
   //pas 7
   xml_parser_free($parser); // deletes the parser
   $i = 1;
   
   foreach($tutors as $course) {
      echo "Nr. curs - ".$i.'<br/>';
      echo "Nume curs - ".$course['NAME'].'<br/>';
      echo "Tara - ".$course['COUNTRY'].'<br/>';
      echo "Email - ".$course['EMAIL'].'<br/>';
      echo "Telefon - ".$course['PHONE'].'<hr/>'; 
      $i++; 
   }
?>