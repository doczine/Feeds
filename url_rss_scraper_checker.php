<?php
set_time_limit(0);
include('../scaperdb.php');
$conn = db_connect();

$query = "SELECT `rss`, `counter` FROM `scraper`.`rss_url` WHERE `checked1` IS NULL limit 1";

if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count, $counter);
    while (mysqli_stmt_fetch($stmt)) {

    }
    mysqli_stmt_close($stmt);
}
$query = "UPDATE `scraper`.`rss_url` SET `checked1` = 'Y' WHERE `rss_url`.`rss` = '".$count."';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

$wget = "curl ".$count;
$page_contents = system($wget);

$findme = "xml version";
$pos = strpos($page_contents, $findme);
$findme = "rss version";
$pos1 = strpos($page_contents, $findme);   
$findme = "xmlns";
$pos2 = strpos($page_contents, $findme);

echo $pos;
echo $pos1;
echo $pos2;

// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.
if ($pos != true or $pos1 != true or $pos2 != true) {
    echo "The string '$findme' was found in the string";
	echo $count;
}
else
{
    echo "The string '$findme' was not found in the string";
        echo $count;

        $query = "DELETE FROM `scraper`.`rss_url` WHERE `rss_url`.`counter` = '".$counter."';";
        if ($stmt = mysqli_prepare($conn, $query)) {
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
        }

}

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
