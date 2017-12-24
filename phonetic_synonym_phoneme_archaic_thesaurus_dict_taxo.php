<?php
$file = file_get_contents('synonym.txt');
/*
$delimiter='
';
$itemList = explode($delimiter, $file);
//print_r($itemList);
$result = count($itemList);
$i = 0;
$huge = '';
do {
$i++;
$huge .= $itemList[$i];
} while ($i < $result);
echo $huge;
*/

$arr = str_split($file, 2);
$arr = array_unique($arr);
print_r($arr);

$result = count($arr);
$i = 0;
$huge = '';
do {
$i++;
system("echo ".$arr[$i]." >> sort.txt");

} while ($i < $result);

?>
