<?php
$xml = <<<'XML'
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
$root = simplexml_load_string($xml);
var_dump($root);