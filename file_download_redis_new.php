<?php
error_reporting(0);
@ini_set('display_errors', 0);
require __DIR__.'/shared.php';

use Predis\Collection\Iterator;

//$client = new Predis\Client($single_server, array('profile' => '2.8'));
$client1 = new Predis\Client($single_server1, array('profile' => '2.8'));
$client2 = new Predis\Client($single_server2, array('profile' => '2.8'));
//$client3 = new Predis\Client($single_server3, array('profile' => '2.8'));
//$client4 = new Predis\Client($single_server4, array('profile' => '2.8'));

/*
db0:keys=111874,expires=0,avg_ttl=0
db12:keys=22,expires=0,avg_ttl=0
db13:keys=5518332,expires=0,avg_ttl=0
db14:keys=906411,expires=0,avg_ttl=0

$single_server1 = array(
    'host' => '127.0.0.1',
    'port' => 6379,
    'database' => 14,
);
$single_server2 = array(
    'host' => '127.0.0.1',
    'port' => 6379,
    'database' => 13,
);

$single_server3 = array(
    'host' => '127.0.0.1',
    'port' => 6379,
    'database' => 12,
);
$single_server = array(
    'host' => '127.0.0.1',
    'port' => 6379,
    'database' => 15,
);
$single_server4 = array(
    'host' => '127.0.0.1',
    'port' => 6379,
    'database' => 0,
);
*/

//include('/var/www/html/db.php');
//$conn = db_connect_100();

function namefile()
{
    return time() ."_". substr(md5(microtime()), 0, mt_rand(10, 10));
}

function fetchUrl($uri) {
    $handle = curl_init();
    curl_setopt($handle, CURLOPT_URL, $uri);
    curl_setopt($handle, CURLOPT_POST, false);
    curl_setopt($handle, CURLOPT_BINARYTRANSFER, false);
    curl_setopt($handle, CURLOPT_HEADER, true);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($handle, CURLOPT_FOLLOWLOCATION, true);
    $response = curl_exec($handle);
    $hlength  = curl_getinfo($handle, CURLINFO_HEADER_SIZE);
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    $body     = substr($response, $hlength);
    // If HTTP response is not 200, throw exception
    return $body;
}

$d = 0;
do {
$count = namefile();
$d = $d + 1;
echo $d;
//$value = $client->get($count);
$value = $client1->executeRaw(["RANDOMKEY"]);
//var_dump($value);
$url = $value;

echo $url;

$date = date("Y-m-d");
$file_folder_name = "/home/remote/rss/".$date;
mkdir($file_folder_name, 0777);
chmod($file_folder_name, 0777);
$destination_file = "/home/remote/rss/".$date."/".$count;
mkdir($destination_file, 0777);
chmod($destination_file, 0777);
$destination_file = "/home/remote/rss/".$date."/".$count."/".$count;
//$curl = "curl -L ".$url." > ".$destination_file;
//system($curl);
$lfhandler = fopen($destination_file, "w");
$filepage = fetchUrl($url);
fwrite($lfhandler, $filepage);
fclose ($lfhandler);
echo $destination_file;

/*
preg_match_all('!(http)(s)?:\/\/[a-zA-Z0-9.?%=&_/]+!', $filepage, $match);
//preg_match_all($regex_2, $page_contents, $match);
//print_r($match);
$match = array_unique($match);
foreach($match[0] as $value2) {
        $value2 = str_replace("%%", "", $value2);
        $value2 = urldecode($value2);
        $value2 = str_replace("%", "", $value2);
    $result = $value2;
    $title = $value2;
    $keyurl = substr($value2, 0, 200);
    $host = "";
    $search_string = "";
    $mysqltime = "";
        //echo $result;
$namer = namefile();

//$file = "/mnt/ramdisk/".$namer;

// The new person to add to the file
$person = $result;
// Write the contents to the file, 
// using the FILE_APPEND flag to append the content to the end of the file
// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
//file_put_contents($file, $person, FILE_APPEND | LOCK_EX);

          //      $client2->set($result, $result); 

}
*/

/*
$dom = new DOMDocument;
$dom->load($destination_file);
if ($dom->validate()) {
    	echo "This document is valid!\n";
	$client2->set($result, $result);
}
*/


/*
$rss = simplexml_load_file($filepage);

if($rss) {
        $items = $rss->channel->item;
        foreach($items as $item) {
                $title = $item->title;
                $link = $item->link;

		$client2->set($result, $result); 

        }
}
*/


/*
$file_size = "";
$mysqltime = date("Y-m-d H:i:s");
$file_mime_type = "application/xml";
$file_extension = "xml";
$file_title = "";
$urlfixed = $url;
$seoterm = "";
$short_file_name = "rss";
$file_extension = "";
*/

 //   $client->set($count, $url); 
 //   $client4->set($count, $mysqltime); 

/*
if ($stmt = mysqli_prepare($conn, "INSERT INTO `docunator`.`file` (`system_file_name`,`file_size`,`file_timestamp`,`file_mime_type`,`file_extension`, `file_title`, `url`, `seoterm`, `short_name`) VALUES (?,?,?,?,?,?,?,?,?)")); {
mysqli_stmt_bind_param($stmt, "sssssssss", $count, $file_size, $mysqltime, $file_mime_type, $file_extension, $file_title, $urlfixed, $seoterm, $short_file_name);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
}
*/


}  while ($d < 2000000);
/*
$query = "SELECT `counter`, `url` FROM `scraper`.`html_url` WHERE `counter` = '".$rand."' `checked` IS NULL limit 1;";

if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count, $url);
    while (mysqli_stmt_fetch($stmt)) {
$client->set($count, $url); 
$value = $client->get($count);
//var_dump($value);
print_r($value);
    }
    mysqli_stmt_close($stmt);
}
*/

?>
