<?php
include('db.php');
$conn = db_connect_100();
$conn1 = db_connect_100();

 $today = date('Y-m-d');
//select key_url, count(*) from feed group by key_url
        $query1 = "SELECT `key_url`, count(*) FROM `scraper`.`feed` group by key_url;";

        if ($stmt1 = mysqli_prepare($conn1, $query1)) {
                        mysqli_stmt_execute($stmt1);
                mysqli_stmt_bind_result($stmt1, $title, $fetch);
                while (mysqli_stmt_fetch($stmt1)) {

if($fetch < 2) {

$query = "DELETE FROM `scraper`.`html_url` WHERE `html_url`.`url` = '".$title."';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
	}

echo $title;
echo $fetch;
}
                }
                mysqli_stmt_close($stmt1);
        }      
       


?>
