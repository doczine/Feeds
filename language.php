<?php

header('Content-Type: text/plain; charset=utf-8');

require_once '/usr/share/php/Text/LanguageDetect.php';
$l = new Text_LanguageDetect();

$l->setNameMode(0);

//example text for language detection
$content = 'return 2-letter language codes only';

//language name
$l->setNameMode(2);
echo $l->detectSimple($content)."\n";
 
//closeness languages
$result = $l->detect($content, 4);
print_r($result);
 
//distribution of unicode blocks
$blocks = $l->detectUnicodeBlocks($content, true);
print_r($blocks);
?>
