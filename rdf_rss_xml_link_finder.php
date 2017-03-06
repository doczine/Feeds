<?php
set_time_limit(0);
include('db.php');
$conn = db_connect_scraper_100();
$conn1 = db_connect_scraper_100();

$query = "SELECT `title` FROM `scraper`.`rss_xml_parse` WHERE `title` LIKE '%.rdf%' AND `title` NOT LIKE '%feedsportal.com%' AND `title` NOT LIKE '%feedproxy.google%';";

if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $url);
    while (mysqli_stmt_fetch($stmt)) {
        echo $url;
    if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `scraper`.`rss_xml_parse` (`url`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt1, "s", $url);
        mysqli_stmt_execute($stmt1);
            mysqli_stmt_close($stmt1);
        }
    }
    mysqli_stmt_close($stmt);
}

$query = "SELECT `title` FROM `scraper`.`rss_xml_parse` WHERE `title` LIKE '%.xml%' AND `title` NOT LIKE '%feedsportal.com%' AND `title` NOT LIKE '%feedproxy.google%';";

if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $url);
    while (mysqli_stmt_fetch($stmt)) {
        echo $url;
    if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `scraper`.`rss_xml_parse` (`url`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt1, "s", $url);
        mysqli_stmt_execute($stmt1);
            mysqli_stmt_close($stmt1);
        }
    }
    mysqli_stmt_close($stmt);
}

$query = "SELECT `title` FROM `scraper`.`rss_xml_parse` WHERE `title` LIKE '%atom%' AND `title` NOT LIKE '%feedsportal.com%' AND `title` NOT LIKE '%feedproxy.google%';";

if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $url);
    while (mysqli_stmt_fetch($stmt)) {
        echo $url;
    if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `scraper`.`rss_xml_parse` (`url`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt1, "s", $url);
        mysqli_stmt_execute($stmt1);
            mysqli_stmt_close($stmt1);
        }
    }
    mysqli_stmt_close($stmt);
}

$query = "SELECT `title` FROM `scraper`.`rss_xml_parse` WHERE `title` LIKE '%feed%' AND `title` NOT LIKE '%feedsportal.com%' AND `title` NOT LIKE '%feedproxy.google%';";

if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $url);
    while (mysqli_stmt_fetch($stmt)) {
        echo $url;
    if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `scraper`.`rss_xml_parse` (`url`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt1, "s", $url);
        mysqli_stmt_execute($stmt1);
            mysqli_stmt_close($stmt1);
        }
    }
    mysqli_stmt_close($stmt);
}

$query = "SELECT `title` FROM `scraper`.`rss_xml_parse` WHERE `title` LIKE '%rss%' AND `title` NOT LIKE '%feedsportal.com%' AND `title` NOT LIKE '%feedproxy.google%';";

if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $url);
    while (mysqli_stmt_fetch($stmt)) {
        echo $url;
    if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `scraper`.`rss_xml_parse` (`url`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt1, "s", $url);
        mysqli_stmt_execute($stmt1);
            mysqli_stmt_close($stmt1);
        }
    }
    mysqli_stmt_close($stmt);
}

?>
