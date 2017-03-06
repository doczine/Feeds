<?php
include('db.php');
$conn = db_connect_scraper_100();
$conn1 = db_connect_100();

 $today = date('Y-m-d');
$today = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")-1, date("Y")));

        $query1 = "SELECT `title`, `url`, `key_url` FROM `scraper`.`feed` WHERE `date` = '".$today."';";

        if ($stmt1 = mysqli_prepare($conn1, $query1)) {
                        mysqli_stmt_execute($stmt1);
                mysqli_stmt_bind_result($stmt1, $title, $fetch, $key);
                while (mysqli_stmt_fetch($stmt1)) {

$place = "";
$place1 = "";
$place2 = "";
$search = "";

if(isset($_GET['search'])){
$search = strip_tags(stripslashes($_GET['search']));
}

if (stripos(strtolower($title), $search) !== false) {
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
