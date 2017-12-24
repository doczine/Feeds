<?php
ini_set('max_execution_time', 0);
ini_set('max_input_time', 0);

include('/var/www/html/db.php');
//$conn = db_connect_scraper_100();
$conn1 = db_connect_100();

$search = "";
//networksetup - setnetworkserviceenabled "Bluetooth DUN" on
$p= 0;
$i = 0;
$c = 25;
//Price_Check
//mysqldump -u root -p3h4xb0011011001tCiK scraper rss_xml_parse --where="timestamp BETWEEN '2017-07-11' and '2017-07-12'" > 2017-07-11.sql
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

function snippet($body, $search){

$counter = substr_count($body, $search);

$needle = $search;
$lastPos = 0;
$positions = array();

while (($lastPos = strpos($body, $needle, $lastPos))!== false) {
        $seed = $lastPos;
    $positions[] = $lastPos;
    $lastPos = $lastPos + strlen($needle);
}
$snippet = "";
foreach ($positions as $value) {
        $pos1 = $value + 150;
        $pos2 = $value - 150;
        $snippet = $snippet."<br>".substr($body, $pos2, 300);
}

return $snippet;
}
if(isset($_GET['date'])){
$date = strip_tags(stripslashes($_GET['date']));
}
else
{
 $date = date('Y-m-d');
}
if(isset($_GET['date1'])){
$date1 = strip_tags(stripslashes($_GET['date1']));
}
else
{
 $date1 = date('Y-m-d');
}
if(isset($_GET['search'])){
$search = strip_tags(stripslashes($_GET['search']));
}
else
{
$search = 'artificial intelligence';
}
if(isset($_GET['page'])){
$page = strip_tags(stripslashes($_GET['page']));
$p = $page * $c;
}

 //       $query1 = "SELECT DISTINCT `title`, `description`, `url`, `timestamp`, `checked` FROM `scraper`.`rss_xml_parse` WHERE `rss_xml_parse`.`timestamp` BETWEEN CAST('".$date."' AS DATE) AND CAST('".$date1."' AS DATE) and `rss_xml_parse`.`title` LIKE '%".$search."%' or `rss_xml_parse`.`description` LIKE '%".$search."%' limit ".$p.", 100;";
$query1 = "SELECT DISTINCT `title`, `description`, `url`
FROM `scraper`.`rss_xml_parse` 
WHERE `rss_xml_parse`.`timestamp` = '".$date."'
AND (`rss_xml_parse`.`title` LIKE '%".$search."%' 
or `rss_xml_parse`.`description` LIKE '%".$search."%') 
limit ".$p.", 25;";

//echo $query1;

        if ($stmt1 = mysqli_prepare($conn1, $query1)) {
                        mysqli_stmt_execute($stmt1);
                mysqli_stmt_bind_result($stmt1, $title, $description, $url);
                while (mysqli_stmt_fetch($stmt1)) {
                
//$filepath = "/home/html/".$timestamp."/".$checked."/".$checked;
//echo $filepath;
//$filehtml = file_get_contents($filepath);
//echo $filehtml;
//echo $count;
$counter = 2;

$body = $description;

//$snippet1 = snippet($body, $search);
//$snippet2 = snippet($filehtml, $search);
//mysqldump -u root -pDU3EIXN37W4IUWDZ --no-data scraper > scraper.sql
if($counter < 1) {

/*
A search and filter algorithm for UC Berkeley's eTriever Student Advising platform based on PHP, Oracle database, and Red Hat. Closed source.

A PBX call center datawarehouse for CTI Telecom based on PHP, CentOS, and MySQL, GNU General Public License v3.0.
https://github.com/doczine/live

A document management, conversion system and web crawler built in PHP, MySQL and Linux, GNU General Public License v3.0.
https://github.com/doczine/doczine

An automated method to crawl, parse, search, store, index, and retrieve XML, ATOM and RSS feeds private use, GNU General Public License v3.0.
https://github.com/doczine/Feeds/

http://www.massdevice.com/medical-imaging-ai-dev-viz-raises-8m-seed-round/


*/

}
else
{
echo "<table class='alternate_color'>";
echo "<tr><td style='font-size:16px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$url."'>".$title."&nbsp;&nbsp;&nbsp;</a></td></tr>";
echo "<td>".$description."<br></td>";
//echo "<td>".$body."<br>".$description."</td>";
// Displays 3 and 10
echo "<tr><td>";

echo "</td></tr>";
echo "</table>";
}
//echo $i;
                }
                mysqli_stmt_close($stmt1);
        }      
       


?>
</table>
</body>
</html>



//The Syrian Holocaust: A Preplanned Genocide And Forced Exodus

//Get time machine
//Get hoody
//