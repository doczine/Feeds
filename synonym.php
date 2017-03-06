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
                echo $master;
    }
    mysqli_stmt_close($stmt);
}

} while ($i < 100000)

?>
