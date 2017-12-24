<?php
set_time_limit(0);
include('db.php');
$conn = db_connect_scraper_100();

$i = 0;
do {
$i++;

//Tw1TCH123!

$url = "http://www.feedage.com/feeds/".$i;

    if ($stmt = mysqli_prepare($conn, "INSERT IGNORE INTO `scraper`.`rss_feedage` (`rss`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt, "s", $url);                                                                                                                                                           
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        }

} while ($i < 23820777);


/*
$query = "SELECT `rss`, `counter` FROM `scraper`.`rss_feedage` WHERE `checked` IS NULL limit 1";

if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count, $counter);
    while (mysqli_stmt_fetch($stmt)) {

    }
    mysqli_stmt_close($stmt);
}
$query = "UPDATE `scraper`.`rss_feedage` SET `checked` = 'Y' WHERE `rss_feedage`.`rss` = '".$count."';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

$wget = "curl ".$count." > ".$counter.".html";
system($wget);
*/

//$page_contents = file_get_contents($file_name);
//echo $page_contents;

/*
//$regex_2 = "/[a-zA-Z0-9_-]*\/*[a-zA-Z0-9_-]+\.pdf/";
$regex_2 = '/http[^\s]+\.pdf/';
preg_match_all($regex_2, $page_contents, $matches2);
print_r($matches2);
*/


/*
foreach($matches2[0] as $value2) {

    $result = $value2;
    $title = $value2;
    $keyurl = substr($value2, 0, 200);
    $host = "";
    $search_string = "";
    $mysqltime = "";
        echo $result;
    if ($stmt = mysqli_prepare($conn, "INSERT IGNORE INTO `scraper`.`results` (`urlcounter`, `title`, `url`, `host`, `seoterm`, `date`) VALUES (?,?,?,?,?,?)")); {
        mysqli_stmt_bind_param($stmt, "ssssss", $keyurl, $title, $result, $host, $search_string, $mysqltime);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        }

}

mysqli_close($conn);
*/

?>
