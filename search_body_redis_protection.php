<?php
ini_set('max_execution_time', 0);
ini_set('max_input_time', 0);

include('/var/www/html/db.php');
$conn1 = db_connect_100();

$search = "";

if(isset($_GET['search'])){
$search = strip_tags(stripslashes($_GET['search']));
}
else
{
$search = 'artifical intelligence';
}
if(isset($_GET['page'])){
$page = strip_tags(stripslashes($_GET['page']));
$c = $page + c;
}
if(isset($_GET['date'])){
$today = strip_tags(stripslashes($_GET['date']));
}
else
{
 $today = date('Y-m-d');
}

$query = "SELECT description FROM search WHERE MATCH(description) AGAINST('".$search."' IN BOOLEAN MODE)";

if ($stmt = mysqli_prepare($conn1, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $body);
    while (mysqli_stmt_fetch($stmt)) {
		//echo $body;
    }
    mysqli_stmt_close($stmt);
}

$counter = substr_count($body, $search);

$needle = $search;
$lastPos = 0;
$positions = array();

while (($lastPos = strpos($body, $needle, $lastPos))!== false) {
	$seed = $lastPos;
    $positions[] = $lastPos;
    $lastPos = $lastPos + strlen($needle);
}

foreach ($positions as $value) {
        $pos1 = $value + 150;
        $pos2 = $value - 150;
        $snippet = substr($body, $pos2, 300);
echo $snippet."<br>";
}


?>
