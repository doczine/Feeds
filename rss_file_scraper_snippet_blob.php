<?php
include('db.php');
$conn = db_connect_scraper_100();
$query = "SELECT `counter`, `url` FROM `scraper`.`html_url` WHERE `checked` IS NULL limit 1;";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count, $url);
    while (mysqli_stmt_fetch($stmt)) {
	echo $count.$url;
    }
    mysqli_stmt_close($stmt);
}
$query = "UPDATE `scraper`.`html_url` SET `checked` = 'Y' WHERE `html_url`.`counter` = '".$count."';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
$rss = "";
$rss = simplexml_load_file($url);
if($rss) {
        echo '<h1>'.$rss->channel->title.'</h1>';
        echo '<li>'.$rss->channel->pubDate.'</li>';
        $items = $rss->channel->item;
        foreach($items as $item) {
                $title = $item->title;
                $link = $item->link;
				if($link = ""){
				$link = $item->guid;
				}
                $description = $item->description;
                echo '<h3><a href="'.$link.'">'.$title.'</a></h3>';
                echo '<span>('.$published_on.')</span>';
                echo '<p>'.$description.'</p>';
                $url_key = substr($link, 0, 200);
				$mysqldate = date("Y-m-d");
                if ($stmt = mysqli_prepare($conn, "INSERT IGNORE INTO `scraper`.`rss_xml_parse` (`url`, `title`, `timestamp`, `description`) VALUES (?,?,?,?)")); {
                        mysqli_stmt_bind_param($stmt, "sss", $link, $title, $mysqldate, $description);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                }
        }       
}

?>
