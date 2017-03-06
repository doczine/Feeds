<?php
//preg_replace('!(http|ftp|scp)(s)?:\/\/[a-zA-Z0-9.?%=&_/]+!', "<a href=\"\\0\">\\0</a>", $content);

set_time_limit(0);
include('db.php');
$conn = db_connect_scraper_100();

/*
$query = "SELECT `counter` FROM `scraper`.`html_url` WHERE `checked2` IS NULL limit 1";

if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    while (mysqli_stmt_fetch($stmt)) {
    }
    mysqli_stmt_close($stmt);
}
$query = "UPDATE `scraper`.`html_url` SET `checked2` = 'Y' WHERE `html_url`.`counter` = '".$count."';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
*/

//$fileurl = $count."_demon_archives.html";
//echo $fileurl;

$fileurl = "/var/www/html/rss.txt";
$file = file_get_contents($fileurl);

//echo $file;

//$wget = "curl ".$count." > ".$counter."_feedage.html";
//system($wget);

$find = preg_match_all('!(http|ftp|scp)(s)?:\/\/[a-zA-Z0-9.?%=&_/]+!', $file, $match);

//print_r($match);

foreach($match as $key => $value)
{
    if (!is_array($value))
    {
        echo $key ." => ". $value ."\r\n" ;
if($value != "" | $value != "s" | $value != "http") {
    if ($stmt = mysqli_prepare($conn, "INSERT IGNORE INTO `scraper`.`html_url` (`url`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt, "s", $value);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        }
}
    }
    else
    {
    //   echo $key ." => array( \r\n";

       foreach ($value as $key2 => $value2)
       {
           echo "\t". $key2 ." => ". $value2 ."\r\n";
if($value2 != "" | $value2 != "s" | $value2 != "http") {
$checked = "Y";
    if ($stmt = mysqli_prepare($conn, "INSERT IGNORE INTO `scraper`.`html_url` (`url`, `checked1`) VALUES (?, ?)")); {
        mysqli_stmt_bind_param($stmt, "ss", $value2, $checked);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        }
}
	}

  //     echo ")";
    }
}

?>
