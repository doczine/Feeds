<?php
/*
include('db.php');
$conn = db_connect_domain();
$master = '';
$query = "SELECT `master` FROM `domain`.`master` ORDER BY RAND() LIMIT 1;";
if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $master);
    while (mysqli_stmt_fetch($stmt)) {
                echo $master;
    }
    mysqli_stmt_close($stmt);
}
*/
$one = $_GET['one'];
$master = $one;
$rhyme = "rhyme ".$master;
exec($rhyme, $results);
//print_r($results);
$paste = '';
foreach ($results as &$value) {
    $paste .= $value;
}
$results = $paste;
$results = str_replace("Finding perfect rhymes for test...", ",", $results);
$results = str_replace("Finding", ",", $results);
$results = str_replace("rhymes", ",", $results);
$results = str_replace("
", ",", $results);
$results = str_replace("1: ", ",", $results);
$results = str_replace("2: ", ",", $results); 
$results = str_replace("3: ", ",", $results); 
$results = str_replace(" ", ",", $results);
$results = str_replace(",,", ",", $results);
$results = str_replace(",,", ",", $results);
$total = explode(',', $results);
$total1 = array_filter($total);

$count = count($total1)-1;
$i = 0;
do {
echo $total1[$i]."<br>";
$i++;
} while ($i < $count);




?>
