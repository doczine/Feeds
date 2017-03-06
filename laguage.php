<?php
require_once('/usr/share/php/Text/LanguageDetect.php');

$text = "return 2-letter language codes only";

$text = 'There are several statistical approaches to language identification using different techniques to classify the data. One technique is to compare the compressibility of the text to the compressibility of texts in a set of known languages.';

try{
	$l = new Text_LanguageDetect();
	$l->setNameMode(2); //return 2-letter language codes only
	$result = $l->detect($text, 52);
	
	print_r($result);
}
catch (Text_LanguageDetect_Exception $e) 
{	

}


?>

