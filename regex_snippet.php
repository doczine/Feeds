<?php
//preg_replace('!(http|ftp|scp)(s)?:\/\/[a-zA-Z0-9.?%=&_/]+!', "<a href=\"\\0\">\\0</a>", $content);

error_reporting(0);
set_time_limit(0);
include('../scaperdb.php');
$conn = db_connect();

/*
$query = "SELECT `counter` FROM `scraper`.`rss_xml_parse` WHERE `solr_url` IS NULL limit 1";

if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    while (mysqli_stmt_fetch($stmt)) {

    }
    mysqli_stmt_close($stmt);
}
$query = "UPDATE `scraper`.`rss_xml_parse` SET `solr_url` = 'Y' WHERE `rss_xml_parse`.`counter` = '".$count."';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
*/

$i = 0;
do {
    $c++;

$fileurl = $c."_demon_archives.html";

//$fileurl = "/var/www/html/rss/1.html";
$str = file_get_contents($fileurl);

//echo $file;

//$wget = "curl ".$count." > ".$counter."_feedage.html";
//system($wget);

//$find = preg_match_all('!(http|ftp|scp)(s)?:\/\/[a-zA-Z0-9.?%=&_/]+!', $file, $match);

preg_match_all('/[\w-]+/u', $str, $matches, PREG_OFFSET_CAPTURE);
$term = 'database';
$span = 3;
for ($i=0, $n=count($matches[0]); $i<$n; ++$i) {
    $match = $matches[0][$i];
    if (strcasecmp($term, $match[0]) === 0) {
        $start = $matches[0][max(0, $i-$span)][1];
        $end = $matches[0][min($n-1, $i+$span+1)][1];
        echo substr($str, $start, $end-$start).'
';
    }
}

} while ($c < 1000000);

//print_r($match);

/*
foreach($match as $key => $value)
{
    if (!is_array($value))
    {
        echo $key ." => ". $value ."\r\n" ;
    if ($stmt = mysqli_prepare($conn, "INSERT IGNORE INTO `scraper`.`rss_url` (`rss`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt, "s", $value);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        }
    }
    else
    {
    //   echo $key ." => array( \r\n";

       foreach ($value as $key2 => $value2)
       {
           echo "\t". $key2 ." => ". $value2 ."\r\n";
    if ($stmt = mysqli_prepare($conn, "INSERT IGNORE INTO `scraper`.`rss_url` (`rss`) VALUES (?)")); {
        mysqli_stmt_bind_param($stmt, "s", $value2);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        }

        }

  //     echo ")";
    }
}
*/
?>
