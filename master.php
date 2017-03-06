<?php
set_time_limit(0);
include('db.php');
$conn = db_connect_scraper_100();
$file = "MASTER";
$filecsv = "MASTER";
$row = 1;
if (($handle = fopen($filecsv, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                $domain = $data[0];
                if ($stmt1 = mysqli_prepare($conn, "INSERT IGNORE INTO `domain`.`master` (`master`) VALUES (?)")); {
                        mysqli_stmt_bind_param($stmt1, "s", $domain);
                        mysqli_stmt_execute($stmt1);
                        mysqli_stmt_close($stmt1);
                }
    }
    fclose($handle);
}
mysqli_close($conn);
?>
