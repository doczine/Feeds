<?php
//python lexconvert.py --phones unicode-ipa $line >> phonemes.txt
include('db.php');
$conn = db_connect_domain();
$i = 0;
do {
$i++;

$master = '';
$query = "SELECT `master` FROM `domain`.`rhyme` WHERE `rhyme`.`rhyme` IS NULL LIMIT 1;";
if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $master);
    while (mysqli_stmt_fetch($stmt)) {
                echo $master;
    }
    mysqli_stmt_close($stmt);
}

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

} while ($i < 490467);
?>
