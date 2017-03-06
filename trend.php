<?php
include('db.php');
$conn1 = db_connect_100();
$conn2 = db_connect_100();

if(isset($_GET['date'])){
$today = strip_tags(stripslashes($_GET['date']));
}
else
{
 $today = date('Y-m-d');
}

$stack = array();

        $query = "SELECT `title` FROM `scraper`.`feed` WHERE `feed`.`date` = '".$today."';";

        if ($stmt = mysqli_prepare($conn2, $query)) {
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $title);
                while (mysqli_stmt_fetch($stmt)) {

/*
		echo $title." ";
		echo $count."
";
*/
array_push($stack, $title);
		}
		mysqli_stmt_close($stmt);
}

$stack1 = array();
        $query = "SELECT `name` FROM `scraper`.`seoterm`;";

        if ($stmt = mysqli_prepare($conn1, $query)) {
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $title);
                while (mysqli_stmt_fetch($stmt)) {

/*
		echo $title." ";
		echo $count."
";
*/
array_push($stack1, $title);
		}
		mysqli_stmt_close($stmt);
}


//$result = array_intersect($stack, $stack1);
//print_r($result); 

foreach($stack1 as $key=>$value) {

	$searchword = $value;
	$matches = array();
	foreach($stack as $k=>$v) {
		if(preg_match("/\b$searchword\b/i", $v)) {
			$matches[$k] = $v;
			echo $v."~".$searchword."<br>";
			
		}
		//unset($stack[$k]);
	}
	echo $value." ";
	echo count($matches)."
<br>";
	
}



//print_r($matches);



?>

