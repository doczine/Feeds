<?php

require __DIR__.'/shared.php';

use Predis\Collection\Iterator;

$client = new Predis\Client($single_server1, array('profile' => '2.8'));

$date = date("Y-m-d");

// Prepare some keys for our example

$red = "redis-cli -n 14 flushdb";
system($red);

$rm = "rm /home/rss/".$date."/output.txt";
system($rm);

$ls = "ls -1 -f /home/rss/".$date." > /home/rss/".$date."/output.txt" ;
$file = system($ls);
$file = file_get_contents("/home/rss/".$date."/output.txt");
$delimiter = "\n";
$splitcontents = explode($delimiter, $file);
//print_r($splitcontents);
foreach($splitcontents as $val) {
    $client->set($val, $val); 
}

?>

