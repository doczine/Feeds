<?php
set_time_limit(0);
ini_set("pcre.recursion_limit", "524");
$amz = "https://commoncrawl.s3.amazonaws.com/";
include('scaperdb.php');
$conn = db_connect();

$query = "SELECT `url`, `count` FROM `scraper`.`commoncrawl` WHERE `check_url` = 'NULL' limit 1;";

if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $name, $count);
    while (mysqli_stmt_fetch($stmt)) {

    }
    mysqli_stmt_close($stmt);
}
$query = "UPDATE `scraper`.`commoncrawl` SET `check_url` = 'Y' WHERE `commoncrawl`.`count` = '".$count."';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
$file = substr(strrchr($name,'/'),1);
$warcurl = $amz.$name;
echo $warcurl;
$wget = "wget ".$warcurl;
echo $wget;
system($wget);
$gunzip = "gunzip ";
$gunzipcommand = $gunzip.$file;
system($gunzipcommand);
$file_name = str_replace(".gz", "", $file);
# Search for relative path documents
$split = "split ".$file_name." -d -b 100M parts";
system($split);
$page_contents = "";
$i = 0;
do {
    $i++;
	if($i <= 9) {
	$i = "0".$i;
	}
	$page_contents = file_get_contents("parts".$i);
//echo $page_contents;
//$regex_2 = "/[a-zA-Z0-9_-]*\/*[a-zA-Z0-9_-]+\.pdf/";
//$regex_2 = '/http[^\s]+\//';
preg_match_all('!(http)(s)?:\/\/[a-zA-Z0-9.?%=&_/]+!', $page_contents, $match);
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

$mystring = $result;
$findme   = '.png';
$pos = strpos($mystring, $findme);
if ($pos === false) {
}
else {
    echo "The string '$findme' was found in the string '$mystring'";
    echo " and exists at position $pos";	
die();
} 

$findme   = '.gif';  
$pos = strpos($mystring, $findme);
if ($pos === false) {
}
else {
    echo "The string '$findme' was found in the string '$mystring'";
    echo " and exists at position $pos";        
die();
} 
$findme   = '.jpg';  
$pos = strpos($mystring, $findme);
if ($pos === false) {
}
else {
    echo "The string '$findme' was found in the string '$mystring'";
    echo " and exists at position $pos";        
die();
} 

    if ($stmt = mysqli_prepare($conn, "INSERT IGNORE INTO `scraper`.`results1` (`urlcounter`, `title`, `url`, `host`, `seoterm`, `date`) VALUES (?,?,?,?,?,?)")); {
        mysqli_stmt_bind_param($stmt, "ssssss", $keyurl, $title, $result, $host, $search_string, $mysqltime);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        }

//if($result != "s" || $result != "" || $result != "http") {
//		if ($stmt = mysqli_prepare($conn, "INSERT INTO `scraper`.`html_url` (`url`) VALUES (?)")); {
//			mysqli_stmt_bind_param($stmt, "s", $result);
//			mysqli_stmt_execute($stmt);
//			mysqli_stmt_close($stmt);
//			echo $result;
//		}
//	}

}
} while ($i < 50);
$rm_zip = "rm parts*";
echo $rm_zip;
system($rm_zip);
//$rm_file = "rm ".$file_name;
//echo $rm_file;
//system($rm_file);

mysqli_close($conn);
?>
