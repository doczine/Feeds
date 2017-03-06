<?php
include('db.php');
$conn = db_connect_scraper_100();
$conn1 = db_connect_100();

 $today = date('Y-m-d');
        $query1 = "SELECT `title`, `url`, `key_url` FROM `scraper`.`feed` WHERE `date` = '".$today."';";

        if ($stmt1 = mysqli_prepare($conn1, $query1)) {
                        mysqli_stmt_execute($stmt1);
                mysqli_stmt_bind_result($stmt1, $title, $fetch, $key);
                while (mysqli_stmt_fetch($stmt1)) {

$place = "";
$place1 = "";
$place2 = "";

if (stripos(strtolower($title), 'phone') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'cell') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'battery') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'democrat') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'print') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'autonomous') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'dna') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'gene') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'saudi arabia') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'musk') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'Bezos') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'larry page') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'bill gates') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'system') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'manufacturer') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'samsung') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'fuel cell') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'networking') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'stock') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'neuron') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'dump') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'nvidia') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'meme') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'solar') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'instagram') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'tumblr') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'snapchat') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'gen z') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'brain') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'conservative') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


$place1 = $key."<br>";
$place2 = $fetch;
}
if (stripos(strtolower($title), 'linux') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'rocket') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'satellite') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'space') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'asteroid') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'facebook') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'google') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'microsoft') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'oracle') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'apple') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'bionic') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'processor') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'nand') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'machine learning') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'database') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'data') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'datum') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'artificial intelligence') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'anonymous') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'linux') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'open source') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'gnu') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'software') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'bot') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'internet') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'tech') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'fund') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'anonymous') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'fund') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'bitcoin') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'encryption') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'android') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'robot') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'drone') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'anonymous') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'cyber') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'hacker') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'implant') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'bionic') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}


if (stripos(strtolower($title), 'genomic') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'nano') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'millennial') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'biometric') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'china') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'germany') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'ceo') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'stem') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'ibm') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'security') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'robo') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'founder') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}


if (stripos(strtolower($title), 'congress') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'unitarian') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'telemetry') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'senate') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'republican') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'obama') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'government') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'internet') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'iot') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'app') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'rfid') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'hard drive') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'substrate') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'warfare') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}


if (stripos(strtolower($title), 'scan') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'search') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'economy') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'fintech') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'iphone') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'analytics') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'russia') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'putin') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

if (stripos(strtolower($title), 'liberal') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'trump') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'russia') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'los angeles') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'ios') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'cloud') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'putin') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'computer') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}
if (stripos(strtolower($title), 'computing') !== false) {
$place = $title;
$place2 = "&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";


}

				
echo $place;
echo $place2;
echo $place1;
                }
                mysqli_stmt_close($stmt1);
        }       
        


?>