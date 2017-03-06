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
		echo "<b>".$title."</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='".$fetch."'>A</a>&nbsp;".$key."<br>";
		}
		mysqli_stmt_close($stmt1);
	}	
	


?>
