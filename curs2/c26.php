<?php

$xml = <<<XML
	<?xml version="1.0" encoding="UTF-8"?>
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
$root->limbaj[0]->nume = 'Python';