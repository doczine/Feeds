<html>
<head>
<style>
      tr:nth-of-type(odd) {
      background-color:#F0FFFF;
    }
      tr:nth-of-type(even) {
      background-color:#87CEFA;
    }
</style>
</head>
<body>
<form action="searchbody.php" style="width:100%;">
  Search:<input type="text" name="search" value="search">    
<?php
if(isset($_GET['search'])){
$search = strip_tags(stripslashes($_GET['search']));
}
else
{
 $today = date('Y-m-d');
}
   
echo "<input type='text' name='date' value='".$today."'>";
?>
  <input type="submit" value="Submit">
</form><br>
<table class="alternate_color">
<?php
ini_set('max_execution_time', 0);
ini_set('max_input_time', 0);

include('db.php');
$conn = db_connect_scraper_100();
$conn1 = db_connect_100();

$search = "";

$i = 0;
$c = 10;

function strip_html_tags($str){
    $str = preg_replace(
        array(// Remove invisible content
            '@<head[^>]*?>.*?</head>@siu',
            '@<style[^>]*?>.*?</style>@siu',
            '@<script[^>]*?.*?</script>@siu',
            '@<noscript[^>]*?.*?</noscript>@siu',
            ),
        "", //replace above with nothing
        $str );
    return $str;
}

if(isset($_GET['search'])){
$search = strip_tags(stripslashes($_GET['search']));
}
else
{
$search = 'artifical intelligence';
}
if(isset($_GET['page'])){
$page = strip_tags(stripslashes($_GET['page']));
$c = $page + c;
}
if(isset($_GET['date'])){
$today = strip_tags(stripslashes($_GET['date']));
}
else
{
 $today = date('Y-m-d');
}

        $query1 = "SELECT DISTINCT `title`, `html`, `url`, `date` FROM `scraper`.`search` WHERE `search`.`html` LIKE '%".$search."%' AND `search`.`date` = '".$today."';";
//        $query1 = "SELECT DISTINCT `title`, `html`, `url`, `date` FROM `scraper`.`search` WHERE `search`.`date` = '".$today."';";

        if ($stmt1 = mysqli_prepare($conn1, $query1)) {
                        mysqli_stmt_execute($stmt1);
                mysqli_stmt_bind_result($stmt1, $title, $body, $key, $date);
                while (mysqli_stmt_fetch($stmt1)) {
                
//$body = preg_replace("/<script\b[^>]*>(.*?)<\/script>/is", "", $body);

$i = $i + 1;

$body = html_entity_decode($body);
$body = strip_html_tags($body);
$body = strip_tags(stripslashes($body));
$body = htmlentities($body);                


$counter = substr_count($body, $search);

$needle = $search;
$lastPos = 0;
$positions = array();

while (($lastPos = strpos($body, $needle, $lastPos))!== false) {
	$seed = $lastPos;
    $positions[] = $lastPos;
    $lastPos = $lastPos + strlen($needle);
}

echo "<tr><td style='font-size:16px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$title."&nbsp;&nbsp;&nbsp;<a href='".$key."'>Link</a></td></tr>";
//echo "<td><textarea rows='10' cols='50'>".$body."</textarea></td>";
// Displays 3 and 10
echo "<tr><td>";
foreach ($positions as $value) {
        $pos1 = $value + 75;
        $pos2 = $value - 25;
        $snippet = substr($body, $pos2, 200);
echo $snippet."<br>";
}

$query = "SELECT description FROM search WHERE MATCH(description) AGAINST('html' IN BOOLEAN MODE)";

$query = "SELECT `urlcounter`, `title`, `url`, `host`, `seoterm`, `date` FROM `scraper`.`results` WHERE `results`.`converted` IS NULL limit 1;";

if ($stmt = mysqli_prepare($conn1, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $urlcounter, $title, $url, $host, $seoterm, $date);
    while (mysqli_stmt_fetch($stmt)) {

    }
    mysqli_stmt_close($stmt);
}


                }
                mysqli_stmt_close($stmt1);
        }      
       
       
       
http://www.talkstreamlive.com/player.htm?as=30944&s=19174&k=fd8ac18b-52a1-4ba0-bf46-93abcc28c93c

http://gcnplayer.gcnlive.com:80/channel2-lo.mp3
http://14623.live.streamtheworld.com:80/KSFOAM_SC
http://crystalout.surfernetwork.com:8001/KLO_MP3




?>
</table>
</body>
</html>
