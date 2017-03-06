<?php
set_time_limit(0);
include('db.php');
$conn = db_connect_scraper_100();
$conn1 = db_connect_scraper_100();

$query = "SELECT `url` FROM `scraper`.`html_url` WHERE `url` LIKE '%.rdf%';";

if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $url);
    while (mysqli_stmt_fetch($stmt)) {
	echo $url;
    if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `scraper`.`rss_url` (`rss`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt1, "s", $url);
        mysqli_stmt_execute($stmt1);
	    mysqli_stmt_close($stmt1);
        }
    }
    mysqli_stmt_close($stmt);
}

$query = "SELECT `url` FROM `scraper`.`html_url` WHERE `url` LIKE '%.xml%';";

if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $url);
    while (mysqli_stmt_fetch($stmt)) {
        echo $url;
    if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `scraper`.`rss_url` (`rss`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt1, "s", $url);
        mysqli_stmt_execute($stmt1);
            mysqli_stmt_close($stmt1);
        }
    }
    mysqli_stmt_close($stmt);
}

$query = "SELECT `url` FROM `scraper`.`html_url` WHERE `url` LIKE '%rss%';";

if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $url);
    while (mysqli_stmt_fetch($stmt)) {
        echo $url;
    if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `scraper`.`rss_url` (`rss`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt1, "s", $url);
        mysqli_stmt_execute($stmt1);
            mysqli_stmt_close($stmt1);
        }
    }
    mysqli_stmt_close($stmt);
}

$query = "SELECT `url` FROM `scraper`.`html_url` WHERE `url` LIKE '%atom%';";

if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $url);
    while (mysqli_stmt_fetch($stmt)) {
        echo $url;
    if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `scraper`.`rss_url` (`rss`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt1, "s", $url);
        mysqli_stmt_execute($stmt1);
            mysqli_stmt_close($stmt1);
        }
    }
    mysqli_stmt_close($stmt);
}

/*
$query = "SELECT `url` FROM `scraper`.`html_url` WHERE `url` LIKE '%feed%' AND NOT LIKE '%feedproxy.google%';";

if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $url);
    while (mysqli_stmt_fetch($stmt)) {
        echo $url;
    if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `scraper`.`rss_url` (`rss`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt1, "s", $url);
        mysqli_stmt_execute($stmt1);
            mysqli_stmt_close($stmt1);
        }
    }
    mysqli_stmt_close($stmt);
}
*/

$query = "SELECT `title` FROM `scraper`.`rss_xml_parse` WHERE `title` LIKE '%.rdf%';";

if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $url);
    while (mysqli_stmt_fetch($stmt)) {
        echo $url;
    if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `scraper`.`rss_url` (`rss`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt1, "s", $url);
        mysqli_stmt_execute($stmt1);
            mysqli_stmt_close($stmt1);
        }
    }
    mysqli_stmt_close($stmt);
}

$query = "SELECT `title` FROM `scraper`.`rss_xml_parse` WHERE `title` LIKE '%.xml%';";

if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $url);
    while (mysqli_stmt_fetch($stmt)) {
        echo $url;
    if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `scraper`.`rss_url` (`rss`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt1, "s", $url);
        mysqli_stmt_execute($stmt1);
            mysqli_stmt_close($stmt1);
        }
    }
    mysqli_stmt_close($stmt);
}

$query = "SELECT `title` FROM `scraper`.`rss_xml_parse` WHERE `title` LIKE '%atom%';";

if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $url);
    while (mysqli_stmt_fetch($stmt)) {
        echo $url;
    if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `scraper`.`rss_url` (`rss`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt1, "s", $url);
        mysqli_stmt_execute($stmt1);
            mysqli_stmt_close($stmt1);
        }
    }
    mysqli_stmt_close($stmt);
}

$query = "SELECT `title` FROM `scraper`.`rss_xml_parse` WHERE `title` LIKE '%feed%';";

if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $url);
    while (mysqli_stmt_fetch($stmt)) {
        echo $url;
    if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `scraper`.`rss_url` (`rss`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt1, "s", $url);
        mysqli_stmt_execute($stmt1);
            mysqli_stmt_close($stmt1);
        }
    }
    mysqli_stmt_close($stmt);
}

$query = "SELECT `title` FROM `scraper`.`rss_xml_parse` WHERE `title` LIKE '%rss%';";

if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $url);
    while (mysqli_stmt_fetch($stmt)) {
        echo $url;
    if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `scraper`.`rss_url` (`rss`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt1, "s", $url);
        mysqli_stmt_execute($stmt1);
            mysqli_stmt_close($stmt1);
        }
    }
    mysqli_stmt_close($stmt);
}

?>
