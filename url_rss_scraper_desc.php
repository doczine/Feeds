<?php
set_time_limit(0);
include('../scaperdb.php');
$conn = db_connect();

$query = "SELECT `rss`, `counter` FROM `scraper`.`rss_url` WHERE `checked` IS NULL ORDER BY `counter` DESC limit 1";

if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count, $counter);
    while (mysqli_stmt_fetch($stmt)) {

    }
    mysqli_stmt_close($stmt);
}
$query = "UPDATE `scraper`.`rss_url` SET `checked` = 'Y' WHERE `rss_url`.`rss` = '".$count."';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

$wget = "curl http://crackest.com/rss/xml/demo/?feed=".$count."> /dev/null";
echo $wget;
system($wget);

?>
