<?php
set_time_limit(0);
include('db.php');
$conn = db_connect_domain();
$name = "";
$counter = "";
$query = "SELECT `name`, `counter` FROM `domain`.`name` WHERE `check` IS NULL LIMIT 1";
if ($stmt = mysqli_prepare($conn, $query)) {
	mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $name, $counter);
    while (mysqli_stmt_fetch($stmt)) {
	}
    mysqli_stmt_close($stmt);
}
$query = "UPDATE `domain`.`name` SET `check` = 'Y' WHERE `name`.`counter` = '".$counter."';";
if ($stmt = mysqli_prepare($conn, $query)) {
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
}
$temp = explode('.', $name);
$ext  = array_pop($temp);
$name = implode('.', $temp);
echo $name;
echo $ext;
$query = "SELECT `master` FROM `domain`.`master` WHERE `master`.`master` = '".$name."';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $domain);
    while (mysqli_stmt_fetch($stmt)) {
    }
    mysqli_stmt_close($stmt);
}
if ($stmt = mysqli_prepare($conn, "INSERT IGNORE INTO `domain`.`match` (`domain`, `extension`) VALUES (?,?)")); {
mysqli_stmt_bind_param($stmt, "ss", $domain, $ext);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
}
mysqli_close($conn);
?>
