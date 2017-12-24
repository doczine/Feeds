<?php
include('db.php');
$conn = db_connect_scraper_100();
$conn1 = db_connect_100();

$today = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")-1, date("Y")));

        $query1 = "SELECT `title`, `url`, `key_url` FROM `scraper`.`feed` WHERE `date` = '".$today."';";

	if ($stmt1 = mysqli_prepare($conn1, $query1)) {
			mysqli_stmt_execute($stmt1);
		mysqli_stmt_bind_result($stmt1, $title, $fetch, $key);
		while (mysqli_stmt_fetch($stmt1)) {

                echo "<b>".$title."</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='".$fetch."'>A</a>&nbsp;".$key."<br>";

		}
		mysqli_stmt_close($stmt1);
	}	
	


?>

<table style="width:100%">
  <tr>
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>Age</th>
  </tr>
  <tr>
    <td>Jill</td>
    <td>Smith</td> 
    <td>50</td>
  </tr>
  <tr>
    <td>Eve</td>
    <td>Jackson</td> 
    <td>94</td>
  </tr>
</table>
