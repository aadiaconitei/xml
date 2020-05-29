<?php
$xml = <<<XML
	<limbaje>
		<limbaj>
			<nume>PHP</nume>
		</limbaj>
		<limbaj>
			<nume>Javascript</nume>
		</limbaj>
		<limbaj>
			<nume>Java</nume>
		</limbaj>
	</limbaje>
XML;
$root = new SimpleXMLElement($xml);
var_dump($root);