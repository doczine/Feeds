<?php
include('db.php');
$conn = db_connect_scraper_100();
$conn1 = db_connect_100();

 $today = date('Y-m-d');
 $today = '2016-10-21';
        $query1 = "SELECT `system_file_name`, `url` FROM `docunator`.`file` WHERE `file_timestamp` LIKE '%".$today."%';";
echo $query1;
        if ($stmt1 = mysqli_prepare($conn1, $query1)) {
                        mysqli_stmt_execute($stmt1);
                mysqli_stmt_bind_result($stmt1, $system_file_name, $url);
                while (mysqli_stmt_fetch($stmt1)) {

$grep = "grep -r 'database' /var/www/html/space/".$system_file_name;
system($grep);

                }
                mysqli_stmt_close($stmt1);
        }      
       


?>