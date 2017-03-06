<html>
<head>
<style>
      tr:nth-of-type(odd) {
      background-color:#F0FFFF;
    }
      tr:nth-of-type(even) {
      background-color:#87CEFA;
    }
</style>
</head>
<body>
<table class="alternate_color">
<?php
include('db.php');
//$conn = db_connect_scraper_100();
//$conn1 = db_connect_100();
 $today = date('Y-m-d');

?>
<form action="searchword.php">
  Search:<input type="text" name="search" value="search">
<?php
echo "<input type='text' name='date' value='".$today."'>";
?>
  <input type="submit" value="Submit">
</form><br>
<?php

 $today = date('Y-m-d');
//        $query1 = "SELECT `title`, `url`, `key_url` FROM `scraper`.`feed` WHERE `date` = '".$today."' AND `title` LIKE '%trump%';";
//echo "<a href='http://feeds.blue/topsearchword.php?search=google'>Try our search!</a><br>";
echo "<a href='http://feeds.blue/searchword.php?search=trump&date=".$today."'>RSS Feed Date Search</a><br>";
echo "<a href='http://feeds.blue/searchworddate.php?search=gene&date=2016-12-25&date1=2016-12-18'>RSS Feed Date RANGE Search</a><br>";
echo "<a href='http://feeds.blue/searchbody.php?search=artificial&date=".$today."'>RSS Feed Article Body Search</a><br>";

/*
	if ($stmt1 = mysqli_prepare($conn1, $query1)) {
			mysqli_stmt_execute($stmt1);
		mysqli_stmt_bind_result($stmt1, $title, $fetch, $key);
		while (mysqli_stmt_fetch($stmt1)) {

echo "<tr><td>".$title."</td>";
echo "<td><a href='".$fetch."'>a</a></td>";
echo "<td><a href='".$key."'>a</a></td></tr>
";

		}
		mysqli_stmt_close($stmt1);
	}	
	
*/

?>
