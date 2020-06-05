<?php
$xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<limbaje>
    <limbaj tip='interpretat'>
        <nume>PHP</nume>
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
        <nume>Python</nume>
    </limbaj>
</limbaje>
XML;
$xslt = <<<XSLT
	
	<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/limbaje">
	<html>
		<head>
			<title>Hello Xslt</title>
		</head>
		<body>
			<xsl:for-each select="/limbaje/limbaj">
			<p>
			<xsl:value-of select="nume"/>
			este un limbaj <xsl:value-of select="@tip"/>
			</p>
			</xsl:for-each>
		</body>
	</html>
	</xsl:template>
	</xsl:stylesheet>
XSLT;
$xmlDoc = new DOMDocument();
$xmlDoc->loadXML($xml);
$xsltDoc = new DOMDocument();
$xsltDoc->loadXML($xslt);
$processor = new XSLTProcessor();
$processor->importStyleSheet($xsltDoc);
echo $processor->transformToXML($xmlDoc);