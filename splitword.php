<?php
include('db.php');
$conn1 = db_connect_100();
$conn2 = db_connect_100();

        $query1 = "SELECT `title` FROM `scraper`.`feed` WHERE `feed`.`checked` IS NULL;";

        if ($stmt1 = mysqli_prepare($conn1, $query1)) {
                        mysqli_stmt_execute($stmt1);
                mysqli_stmt_bind_result($stmt1, $title);
                while (mysqli_stmt_fetch($stmt1)) {

		$comp = preg_split('/\s+/', $title);	

foreach ($comp as $a=>$b){    

                if ($stmt = mysqli_prepare($conn2, "INSERT IGNORE INTO `scraper`.`trend` (`word`) VALUES (?)")); {
                        mysqli_stmt_bind_param($stmt, "s", $b);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                }

}

                }
                mysqli_stmt_close($stmt1);
        }
?>
