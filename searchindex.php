
<?php
include('db.php');
$conn = db_connect_scraper_100();

function fetchUrl($uri) {
    $handle = curl_init();
    curl_setopt($handle, CURLOPT_URL, $uri);
    curl_setopt($handle, CURLOPT_POST, false);
    curl_setopt($handle, CURLOPT_BINARYTRANSFER, false);
    curl_setopt($handle, CURLOPT_HEADER, true);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 10);
    $response = curl_exec($handle);
    $hlength  = curl_getinfo($handle, CURLINFO_HEADER_SIZE);
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    $body     = substr($response, $hlength);
    // If HTTP response is not 200, throw exception
/*
    if ($httpCode != 200) {
        throw new Exception($httpCode);
    }
*/
    return $body;
}

$date = date("Y-m-d");

$query = "SELECT `system_file_name`, `url`, `title` FROM `scraper`.`feed` WHERE `checked` IS NULL and date = '".$date."' ORDER BY counter DESC limit 1;";
echo $query;
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $system_file_name, $url, $title);
    while (mysqli_stmt_fetch($stmt)) {
	 $key = $url;
    }
    mysqli_stmt_close($stmt);
}
$url = str_replace("'", "%27", $url);
echo $url;
$query = "UPDATE `scraper`.`feed` SET `checked` = 'Y' WHERE `feed`.`url` = '".$url."';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
$body = fetchUrl($url);
//echo $body;

if ($stmt = mysqli_prepare($conn, "INSERT IGNORE INTO `scraper`.`search` (`system_file_name`, `url`, `title`, `date`, `html`) VALUES (?,?,?,?,?)")); {
	mysqli_stmt_bind_param($stmt, "sssss", $system_file_name, $key, $title, $date, $body);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
}

/*

CREATE TABLE search (
counter INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
html LONGTEXT,
url VARCHAR(500) NOT NULL UNIQUE,
system_file_name varchar(25),
title varchar(500),
date date,
FULLTEXT idx (html)
) ENGINE=InnoDB;

*/

?>
