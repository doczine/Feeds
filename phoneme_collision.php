<?php
//python lexconvert.py --phones unicode-ipa $line >> phonemes.txt
include('db.php');
$conn = db_connect_domain();
$match = array();
$match1 = array();
$sort = array();
$array_counter = array();
$ech = "";

$lookup = "asterisk";
$rhyme = "";
$query = "SELECT `master`, `rhyme` FROM `domain`.`rhyme` WHERE `rhyme`.`master` = '".$lookup."';";
if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $lookup, $rhyme);
    while (mysqli_stmt_fetch($stmt)) {
//                echo $slave;
    }
    mysqli_stmt_close($stmt);
}

$i = 0;
do {
$i++;

$slave = '';
$query = "SELECT `master`, `rhyme` FROM `domain`.`rhyme` WHERE `rhyme`.`counter` = '".$i."';";
if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $word, $slave);
    while (mysqli_stmt_fetch($stmt)) {
//                echo $slave;
    }
    mysqli_stmt_close($stmt);
}

$master = '';
$arr = array();
$p = 0;
$query = "SELECT `rhyme` FROM `domain`.`phoneme`;";
if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $master);
    while (mysqli_stmt_fetch($stmt)) {
		$p++;
		$arr[$p] = $master;
    }
    mysqli_stmt_close($stmt);
}
//print_r($arr);
$d = 0;
$domain = "";
foreach ($arr as &$value) {
	if($value != '') {
	$domain = strstr($slave, $value);
	}
	if($domain != ""){
//        echo "Word ".$value."";
	$d++;
	$match[$d] = $value;
	}
	else
	{
        //echo "empty";
	}
}

$e = 0;
$domain = "";
foreach ($arr as &$value) {
        if($value != '') {
        $domain = strstr($rhyme, $value);
        }
        if($domain != ""){
//        echo "Rhyme ".$value."";
        $e++;
        $match1[$e] = $value;
        }
        else
        {
        //echo "empty";
        }
}

//print_r($match);
//print_r($match1);

$result = array_intersect($match, $match1);
$array_count = count($result);
//echo $array_count;
//$array_counter[$i][$array_count] = $word;

//print_r($array_counter);

//print_r($result);

//krsort($array_counter);

$echo = $lookup.",".$word.",".$array_count."
";

//echo $ech;

$file = $lookup.".csv";
file_put_contents($file, $ech, FILE_APPEND | LOCK_EX);

//$sort = "LC_ALL=C sort -t, -k3 ".$file." > ".$file."_sorted.csv";
//system($sort);

//system("rm ".$file);

//system("print ".$ech." >> ".$lookup.".csv");

/*
foreach($array_counter as $k => $v) {
	print_r($v);
	print_r($k);
}
*/
//print_r($array_counter);


/*
$array_max = max($array_counter);
$sort = $sort[$array_count];
$sort_count = count($sort);

if($sort_count > ($array_max - 1)) {
	$array_counter = $array_counter[$word];
}

print_r($sort);
*/

/*
echo $lookup.",".$word.",".$array_count."
";
*/

/*
foreach ($match as $matchs) {
//    echo $matchs[0];
    echo $matchs[1];
    echo $matchs[2];
}
*/

//print_r($match);
/*
$dict = array();
$dict = $slave[print_r($match)];
print_r($dict);
*/

} while ($i < 10000)

?>


