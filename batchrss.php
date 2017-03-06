
<?php
include('db.php');
$conn = db_connect_scraper_100();
$conn1 = db_connect_scraper_100();

$url = "http://news.google.com/?ned=us&topic=t&output=rss";

$query = "SELECT `counter`, `url` FROM `scraper`.`html_url`;";

if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count, $url);
    while (mysqli_stmt_fetch($stmt)) {
$rss = simplexml_load_file($url);

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
                if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `scraper`.`feed` (`system_file_name`, `url`, `key_url`, `title`, `date`) VALUES (?,?,?,?,?)")); {
                        mysqli_stmt_bind_param($stmt1, "sssss", $serial, $link, $url, $title, $published_on);
                        mysqli_stmt_execute($stmt1);
                        mysqli_stmt_close($stmt1);
                }

        }
}

    }
    mysqli_stmt_close($stmt);
}

?>
