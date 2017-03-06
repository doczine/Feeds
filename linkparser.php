<?php
require("scaperdb.php");
$conn = db_connect();

$file = file_get_contents("wat.paths");
$delimiter = "\n";
$splitcontents = explode($delimiter, $file);
//print_r($splitcontents);
foreach($splitcontents as $val) {
    $result = $val;
    $title = $val;
    $keyurl = substr($val, 0, 200);
    $host = "";
    $search_string = "";
    $mysqltime = "";
    if ($stmt = mysqli_prepare($conn, "INSERT IGNORE INTO `scraper`.`commoncrawl` (`url`) VALUES (?)")); {
	mysqli_stmt_bind_param($stmt, "s", $result);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	}
}
?>
