<?php
include('db.php');
$joe = $_SERVER['SERVER_NAME'];
$conn = db_connect_100();
$file = "";
if(isset($_GET['file'])) {
	$file = strip_tags(stripslashes($_GET["file"]));
}
$file = $file * 10000;
$file1 = $file + 10000;
$file = $file + 2915367;
$file1 = $file1 + 2915367;
$query = "select `system_file_name` from `docunator`.`file` where `file`.`counter` BETWEEN ".$file." AND ".$file1.";";
if($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $system_file_name);
    while (mysqli_stmt_fetch($stmt)) {
        echo "<a href='http://".$joe."/".$system_file_name.".html'>".$system_file_name."</a>";
        echo $count."<br>";
    }
    mysqli_stmt_close($stmt);
}

?>
