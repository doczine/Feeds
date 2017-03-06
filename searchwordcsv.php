<?php
include('db.php');
$conn = db_connect_scraper_100();
$conn1 = db_connect_100();

$search = "";

if(isset($_GET['search'])){
$search = strip_tags(stripslashes($_GET['search']));
}

if(isset($_GET['date'])){
$today = strip_tags(stripslashes($_GET['date']));
}
else
{
 $today = date('Y-m-d');
}
        $query1 = "SELECT `title`, `url`, `key_url`, `date` FROM `scraper`.`feed` WHERE `feed`.`title` LIKE '%".$search."%' AND `feed`.`date` = '".$today."';";

        if ($stmt1 = mysqli_prepare($conn1, $query1)) {
                        mysqli_stmt_execute($stmt1);
                mysqli_stmt_bind_result($stmt1, $title, $fetch, $key, $date);
                while (mysqli_stmt_fetch($stmt1)) {

echo "'".$title."',";
echo "'".$fetch."',";
echo "'".$key."'<br>
";
                }
                mysqli_stmt_close($stmt1);
        }      
       


?>
