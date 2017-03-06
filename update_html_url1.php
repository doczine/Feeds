<?php
include('db.php');
$conn = db_connect_scraper_100();
        $query1 = "UPDATE `scraper`.`html_url1` SET `checked` = NULL;";

        if ($stmt1 = mysqli_prepare($conn, $query1)) {
                        mysqli_stmt_execute($stmt1);
                mysqli_stmt_close($stmt1);
        }       
        


?>
