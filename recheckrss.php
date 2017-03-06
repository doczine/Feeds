<?php
include('db.php');
$conn1 = db_connect_100();
$conn2 = db_connect_100();

        $query1 = "SELECT `key_url` FROM `scraper`.`feed` WHERE `feed`.`date` BETWEEN CAST('2017-01-01' AS DATE) AND CAST('2017-01-07' AS DATE);";

        if ($stmt1 = mysqli_prepare($conn1, $query1)) {
                        mysqli_stmt_execute($stmt1);
                mysqli_stmt_bind_result($stmt1, $title);
                while (mysqli_stmt_fetch($stmt1)) {


$query = "UPDATE `scraper`.`html_url` SET `checked1` = 'Y' WHERE `html_url`.`url` = '".$title."';";
if ($stmt = mysqli_prepare($conn2, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}			


                }
                mysqli_stmt_close($stmt1);
        }
?>
