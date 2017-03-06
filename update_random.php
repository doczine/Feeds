<?php
include("db.php");
$conn1 = db_connect_scraper_100();
$i = 0;
do {
$i++;
$s = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 1)), 0, 1);
echo $s;
$query = "SELECT `id` FROM `scraper`.`results` WHERE `results`.`random` IS NULL AND `results`.`converted` IS NULL LIMIT 1;";
//echo $query;
$id = '';
if ($stmt = mysqli_prepare($conn1, $query)) {
    		mysqli_stmt_execute($stmt);
   	 	mysqli_stmt_bind_result($stmt, $id);
    		while (mysqli_stmt_fetch($stmt)) {
//                	echo $id;
                }
   		mysqli_stmt_close($stmt);
	}

                $query1 = "UPDATE `scraper`.`results` SET `random` = '".$s."' WHERE `results`.`id` = '".$id."';";
//                echo $query1;
                if ($stmt1 = mysqli_prepare($conn1, $query1)) {
                        mysqli_stmt_execute($stmt1);
                        mysqli_stmt_close($stmt1);
                }

} while ($i < 3500000);
?>
