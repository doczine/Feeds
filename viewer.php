<?php
include('header.php');
<table class="alternate_color">
include('db.php');
$conn1 = db_connect_100();
if(!isset($_GET['doc'])){
	$doc = strip_tags(stripslashes($_GET["doc"]))
}
        $query1 = "SELECT DISTINCT `title`, `description`, `url`, `counter` FROM `scraper`.`rss_xml_parse1` WHERE `counter` = '".$doc."';";
	if ($stmt1 = mysqli_prepare($conn1, $query1)) {
		mysqli_stmt_execute($stmt1);
		mysqli_stmt_bind_result($stmt1, $title, $fetch, $key, $counter);
		while (mysqli_stmt_fetch($stmt1)) {

echo "<tr><td>".$title."</td>";
echo "<td><a href='http://scanregister.com/".$counter."'>a</a></td>";
echo "<td>".$fetch."</td>";
echo "<td><a href='".$key."'>Cache URL</a></td></tr>
";
		}
		mysqli_stmt_close($stmt1);
	}		
?>
