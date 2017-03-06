<?php

//php -f xml_index.php > site1.xml

$i = 33;
do {
$i++;
echo $i;
$file = "php -f xml_index_counter.php > site".$i.".txt";
system($file);
sleep(5);
} while ($i < 214);



?>
