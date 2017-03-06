<?php
include('db.php');
$conn = db_connect_scraper_100();
$query = "DELETE FROM `scraper`.`results` WHERE `url` LIKE '%&#%';";
if ($stmt = mysqli_prepare($conn, $query)) {
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
}
$query = "DELETE FROM `scraper`.`results` WHERE `url` LIKE '%>%';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
}
$query = "DELETE FROM `scraper`.`results` WHERE `url` LIKE '%\'%';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
}
$query = "DELETE FROM `scraper`.`results` WHERE `url` LIKE '%\"%';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
}
$query = "DELETE FROM `scraper`.`results` WHERE `url` LIKE '%\\%';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
}
$query = "DELETE FROM `scraper`.`results` WHERE `url` LIKE '%\\\%';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
}
$query = "DELETE FROM `scraper`.`results` WHERE `url` LIKE '%\\\\%';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
}
$query = "DELETE FROM `scraper`.`results` WHERE `url` LIKE '%\\\\\%';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
}
?>
