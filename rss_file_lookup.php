<?php
set_time_limit(0);

include('db.php');
$conn = db_connect_scraper_100();

$conn1 = db_connect_scraper_100();

$query = "SELECT `counter`, `url` FROM `docunator`.`file` WHERE `file`.`url` LIKE '%xml%' AND `file`.`google_index` IS NULL limit 1;";

if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count, $url);
    while (mysqli_stmt_fetch($stmt)) {
echo $count;
echo $url;
    }
    mysqli_stmt_close($stmt);
}
$query = "UPDATE `docunator`.`file` SET `google_index` = 'Y' WHERE `file`.`counter` = '".$count."';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `scraper`.`rss_xml_parse` (`url`) VALUES (?)")); {
mysqli_stmt_bind_param($stmt1, "s", $url);
mysqli_stmt_execute($stmt1);
mysqli_stmt_close($stmt1);
}

$query = "SELECT `counter`, `url` FROM `docunator`.`file` WHERE `file`.`url` LIKE '%atom%' AND `file`.`google_index` IS NULL limit 1;";

if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count, $url);
    while (mysqli_stmt_fetch($stmt)) {
echo $count;
echo $url;
    }
    mysqli_stmt_close($stmt);
}
$query = "UPDATE `docunator`.`file` SET `google_index` = 'Y' WHERE `file`.`counter` = '".$count."';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `scraper`.`rss_xml_parse` (`url`) VALUES (?)")); {
mysqli_stmt_bind_param($stmt1, "s", $url);
mysqli_stmt_execute($stmt1);
mysqli_stmt_close($stmt1);
}

$query = "SELECT `counter`, `url` FROM `docunator`.`file` WHERE `file`.`url` LIKE '%feed%' AND `file`.`url` NOT LIKE '%feedsportal.com%' AND `file`.`url` NOT LIKE '%feedproxy.google%' AND `file`.`google_index` IS NULL limit 1;";

if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count, $url);
    while (mysqli_stmt_fetch($stmt)) {
echo $count;
echo $url;
    }
    mysqli_stmt_close($stmt);
}
$query = "UPDATE `docunator`.`file` SET `google_index` = 'Y' WHERE `file`.`counter` = '".$count."';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `scraper`.`rss_xml_parse` (`url`) VALUES (?)")); {
mysqli_stmt_bind_param($stmt1, "s", $url);
mysqli_stmt_execute($stmt1);
mysqli_stmt_close($stmt1);
}

?>
