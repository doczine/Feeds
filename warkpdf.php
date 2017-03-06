<?php
include('../scaperdb.php');
$conn = db_connect();
# Search for relative path documents
$page_contents = file_get_contents("25.html");
//$regex_2 = "/[a-zA-Z0-9_-]*\/*[a-zA-Z0-9_-]+\.pdf/";
$regex_2 = '/http[^\s]+Original/';
preg_match_all($regex_2, $page_contents, $matches2);
foreach($matches2[0] as $value2) {
	echo $value2 . "
";
    $result = $value2;
    $title = $value2;
    $keyurl = substr($value2, 0, 200);
    $host = "";
    $search_string = "";
    $mysqltime = "";
    /*
    if ($stmt = mysqli_prepare($conn, "INSERT IGNORE INTO `scraper`.`results` (`urlcounter`, `title`, `url`, `host`, `seoterm`, `date`) VALUES (?,?,?,?,?,?)")); {
        mysqli_stmt_bind_param($stmt, "ssssss", $keyurl, $title, $result, $host, $search_string, $mysqltime);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        }
    */
}
?>
