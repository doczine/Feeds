<?php
//preg_replace('!(http|ftp|scp)(s)?:\/\/[a-zA-Z0-9.?%=&_/]+!', "<a href=\"\\0\">\\0</a>", $content);

error_reporting(0);
set_time_limit(0);
include('../scaperdb.php');
$conn = db_connect();


$query = "SELECT `counter` FROM `scraper`.`rss_xml_parse` WHERE `solr_url` IS NULL limit 1";

if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    while (mysqli_stmt_fetch($stmt)) {

    }
    mysqli_stmt_close($stmt);
}
$query = "UPDATE `scraper`.`rss_xml_parse` SET `solr_url` = 'Y' WHERE `rss_xml_parse`.`counter` = '".$count."';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}



$i = 0;
do {
    $c++;

$fileurl = $c.".html";

//$fileurl = "http://localhost:8080/solr/techproducts/browse?&q=id%3A%".$c."%22&wt=xml";

//$fileurl = "/var/www/html/rss/1.html";
$str = file_get_contents($fileurl);


//echo $file;

//$wget = "curl ".$count." > ".$counter."_feedage.html";
//system($wget);

$find = preg_match_all('!(xml)(s)?:\/\/[a-zA-Z0-9.?%=&_/]+!', $file, $match);

print_r($match);

} while ($c < 1000000);

?>
