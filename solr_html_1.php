<?php
set_time_limit(0);
include('../scaperdb.php');
$conn = db_connect();

$query = "SELECT `url`, `counter` FROM `scraper`.`html_url` WHERE `checked1` IS NULL AND `counter` % 2  = 0 limit 1";

if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $url, $counter);
    while (mysqli_stmt_fetch($stmt)) {

    }
    mysqli_stmt_close($stmt);
}
$query = "UPDATE `scraper`.`html_url` SET `checked1` = 'Y' WHERE `html_url`.`counter` = '".$counter."';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

//$wget = "curl ".$url." > ".$counter."_demon_archives.html";
//system($wget);

$wget = "curl 'http://localhost:8080/solr/techproducts/update/extract?literal.id=".$counter."_demon_archives&commit=true' -F 'myfile=@/var/www/html/archive/".$counter."_demon_archives.html'";
echo $wget;
system($wget);

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
