<?php
$file = file_get_contents('synonym.txt');

$delimiter='
';
$itemList = explode($delimiter, $file);
//print_r($itemList);
$result = count($itemList);
$p = 0;
$huge = '';
do {
$p++;
$huge .= $itemList[$p];
} while ($p < $result);
echo $huge;


$arr = str_split($file, 2);
$arr = array_unique($arr);
print_r($arr);

$result = count($arr);
$p = 0;
$huge = '';
do {
$p++;
system("echo ".$arr[$p]." >> sort.txt");

} while ($p < $result);

?>
