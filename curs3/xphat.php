<?php
$php ='PHP';
$xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<limbaje>
    <curs> 
        <limbaj tip='interpretat' data="test">
            <nume>Demo</nume>
            <test>
                <limbaj>
                    <nume>Demo2</nume>
                </limbaj>
            </test>
        </limbaj>
    </curs>
    <limbaj tip='interpretat' data="test">
        <nume>$php</nume>
    </limbaj>
	<limbaj tip='compilat'>
        <nume>C++</nume>
    </limbaj>
    <limbaj tip='interpretat'>
        <nume>Javascript</nume>
    </limbaj>
    <limbaj tip='compilat'>
        <nume>Java</nume>
    </limbaj>
	<limbaj>
        <nume> sdasd     Python      sssss  sss</nume>
    </limbaj>
</limbaje>
XML;

$root = new SimpleXMLElement($xml);

//va selecta toate elementele copil ale tagului limbaje
$limbaje = $root->xpath("/limbaje/*"); 
echo "<pre>";
print_r($limbaje);

// //selecteaza atribute cu nume tip
// $atribute = $root->xpath("//@tip"); 
// echo "<pre>";
// print_r($atribute);

// //va selecta toate elementele copil ale tagului limbaje cu tip='interpretat'
// //limbaj[@tip='interpretat']
// $interpretat = $root->xpath("//limbaj[@tip='interpretat']"); 
// echo "<pre>";
// print_r($interpretat);


// //limbajul python
// $python = $root->xpath("//limbaj[nume='Python']"); 
// echo "<pre>";
// print_r($python);

//primul nod
// $prim = $root->xpath("//limbaj[1]"); 
// echo "<pre>";
// print_r($prim);


//limbajul python
$python = $root->xpath("//limbaj/nume[contains(.,'Python')]"); 
echo "<pre>";
print_r($python);
// //limbajul python
// $python = $root->xpath("//limbaj[starts-with(nume,'Python')]"); 
// echo "<pre>";
// print_r($python);