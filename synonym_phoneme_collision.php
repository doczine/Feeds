<?php
//python lexconvert.py --phones unicode-ipa $line >> phonemes.txt
include('db.php');
$conn = db_connect_domain();
$p = 0;
do {
$p++;
$master = 'check';
$query = "SELECT `rhyme` FROM `domain`.`rhyme` WHERE `rhyme`.`counter` = '".$p."';";
if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $master);
    while (mysqli_stmt_fetch($stmt)){
        echo $master;
    }
    mysqli_stmt_close($stmt);
}
} while ($p < 250000);
?>
