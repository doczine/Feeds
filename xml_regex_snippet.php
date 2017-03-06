<?php
//preg_replace('!(http|ftp|scp)(s)?:\/\/[a-zA-Z0-9.?%=&_/]+!', "<a href=\"\\0\">\\0</a>", $content);

error_reporting(0);
set_time_limit(0);
include('../scaperdb.php');
$conn = db_connect();

/*
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
*/

$i = 0;
do {
$c++;
$fileurl = $c."_demon_archives.html";
$str = file_get_contents($fileurl);
$findme   = 'feed xmlns';
$pos = strpos($str, $findme);

// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.
if ($pos === false) {
    //echo "The string '$findme' was not found in the string '$mystring'";
} else {
    echo "The string '$findme' was found in the string '$mystring'";
    echo " and exists at position $pos";

$query = "SELECT `title` FROM `scraper`.`rss_xml_parse` WHERE `counter` = ".$c.";";

if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $url);
    while (mysqli_stmt_fetch($stmt)) {
    }
    mysqli_stmt_close($stmt);
}

    if ($stmt = mysqli_prepare($conn, "INSERT IGNORE INTO `scraper`.`rss_url` (`rss`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt, "s", $url);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        	}
	}

} while ($c < 1000000);

?>
