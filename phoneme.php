<?php
//python lexconvert.py --phones unicode-ipa $line >> phonemes.txt
include('db.php');
$conn = db_connect_domain();
$i = 0;
do {
$i++;

$master = '';
$query = "SELECT `rhyme` FROM `domain`.`rhyme` WHERE `rhyme`.`counter` = '".$i."';";
if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $master);
    while (mysqli_stmt_fetch($stmt)) {
                echo $master."
";
    }
    mysqli_stmt_close($stmt);
}

$arr = str_split($master, 1);
$arr = array_unique($arr);
//print_r($arr);
$result = count($arr);
$c = 0;
$huge = '';
do {
$c++;
$vari = $arr[$c];
//echo $vari;
$urlcounter = mysqli_real_escape_string($conn1, $vari);
echo $urlcounter;
$conn1 = db_connect_domain();
if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `domain`.`phoneme` (`rhyme`) VALUES (?);")); {
        mysqli_stmt_bind_param($stmt1, "s", $urlcounter);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_close($stmt1);
        }

//echo $c;
} while ($c < $result);

$arr = str_split($master, 2);
$arr = array_unique($arr);
//print_r($arr);
$result = count($arr);
$c = 0;
$huge = '';
do {
$c++;
$vari = $arr[$c];
//echo $vari;
$urlcounter = mysqli_real_escape_string($conn1, $vari);
echo $urlcounter;
$conn1 = db_connect_domain();
if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `domain`.`phoneme` (`rhyme`) VALUES (?);")); {
        mysqli_stmt_bind_param($stmt1, "s", $urlcounter);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_close($stmt1);
        }

//echo $c;
} while ($c < $result);

$arr = str_split($master, 3);
$arr = array_unique($arr);
//print_r($arr);
$result = count($arr);
$c = 0;
$huge = '';
do {
$c++;
$vari = $arr[$c];
//echo $vari;
$urlcounter = mysqli_real_escape_string($conn1, $vari);
echo $urlcounter;
$conn1 = db_connect_domain();
if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `domain`.`phoneme` (`rhyme`) VALUES (?);")); {
        mysqli_stmt_bind_param($stmt1, "s", $urlcounter);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_close($stmt1);
        }

//echo $c;
} while ($c < $result);

$arr = str_split($master, 4);
$arr = array_unique($arr);
//print_r($arr);
$result = count($arr);
$c = 0;
$huge = '';
do {
$c++;
$vari = $arr[$c];
//echo $vari;
$urlcounter = mysqli_real_escape_string($conn1, $vari);
echo $urlcounter;
$conn1 = db_connect_domain();
if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `domain`.`phoneme` (`rhyme`) VALUES (?);")); {
        mysqli_stmt_bind_param($stmt1, "s", $urlcounter);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_close($stmt1);
        }

//echo $c;
} while ($c < $result);

$arr = str_split($master, 5);
$arr = array_unique($arr);
//print_r($arr);
$result = count($arr);
$c = 0;
$huge = '';
do {
$c++;
$vari = $arr[$c];
//echo $vari;
$urlcounter = mysqli_real_escape_string($conn1, $vari);
echo $urlcounter;
$conn1 = db_connect_domain();
if ($stmt1 = mysqli_prepare($conn1, "INSERT IGNORE INTO `domain`.`phoneme` (`rhyme`) VALUES (?);")); {
        mysqli_stmt_bind_param($stmt1, "s", $urlcounter);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_close($stmt1);
        }

//echo $c;
} while ($c < $result);




/*
$command = "python ~/src/lexconvert.py --phones unicode-ipa ".$master;
$out = '';
exec($command, $out);
$urlcounter = $out[0];
$urlcounter = mysqli_real_escape_string($conn, $urlcounter);
$query = "UPDATE `domain`.`rhyme` SET `rhyme` = '".$urlcounter."' WHERE `rhyme`.`master` = '".$master."';";
if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
}
*/
} while ($i < 34335);
?>


