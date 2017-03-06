
<?php
include('db.php');
$conn = db_connect_scraper_100();
$url = "http://news.google.com/?ned=us&topic=t&output=rss";

$rand = rand(0, 734679);
$rand1 = $rand - 1000;

$query = "SELECT `counter`, `url` FROM `scraper`.`html_url1` WHERE `checked` IS NULL limit 1;";

if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count, $url);
    while (mysqli_stmt_fetch($stmt)) {
	echo $count.$url;
    }
    mysqli_stmt_close($stmt);
}
$query = "UPDATE `scraper`.`html_url1` SET `checked` = 'Y' WHERE `html_url1`.`counter` = '".$count."';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

$rss = simplexml_load_file($url);

function namefile()
{
    return time() ."_". substr(md5(microtime()), 0, mt_rand(10, 10));
}
$serial = namefile();
//$destination_file = "/home/rss/".$serial;
//mkdir($destination_file, 0777);
//chmod($destination_file, 0777);
//$destination_file = "/home/rss/".$serial."/".$serial;
//$lfhandler = fopen($destination_file, "w");
//fwrite($lfhandler, $rss);
//fclose ($lfhandler);
if($rss) {
	echo '<h1>'.$rss->channel->title.'</h1>';
	echo '<li>'.$rss->channel->pubDate.'</li>';
	$items = $rss->channel->item;
	foreach($items as $item) {
		$title = $item->title;
		$link = $item->link;
		$published_on = $item->pubDate;
		$published_on = date("Y-m-d");
	echo $published_on;
		$description = $item->description;
		echo '<h3><a href="'.$link.'">'.$title.'</a></h3>';
		echo '<span>('.$published_on.')</span>';
		echo '<p>'.$description.'</p>';
		$url_key = substr($link, 0, 200);
		if ($stmt = mysqli_prepare($conn, "INSERT IGNORE INTO `scraper`.`feed` (`system_file_name`, `url`, `key_url`, `title`, `date`) VALUES (?,?,?,?,?)")); {
			mysqli_stmt_bind_param($stmt, "sssss", $serial, $link, $url, $title, $published_on);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
		}

	}
}

//alter table feed add constraint urlcounter foreign key (urlcounter) references results (urlcounter);
//ALTER TABLE feed ADD url_key varchar(500);
//ALTER TABLE feed ADD system_file_name varchar(25) NOT NULL DEFAULT;
?>
