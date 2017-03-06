<?php
include("../db.php");
$urlindex = "";
$conn = db_connect_100();
$i = 0;
do {
$i++;
$query = "SELECT `system_file_name`, `short_name` FROM `docunator`.`file` WHERE `file`.`search_index` LIKE '' LIMIT 1;";

if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $system_file_name, $short_name);
    while (mysqli_stmt_fetch($stmt)) {
        echo $system_file_name;
    }
    mysqli_stmt_close($stmt);
}

$doc = $system_file_name;

$index = "curl 'http://localhost:8080/solr/techproducts/update/extract?literal.id=".$doc."&commit=true' -F 'myfile=@/home/cracker/".$doc."/".$short_name."pdf'";
echo $index;
system($index, $retval3);
        $query = "UPDATE `docunator`.`file` SET `search_index` = 'Y' WHERE `file`.`system_file_name` = '".$doc."';";

        if ($stmt = mysqli_prepare($conn, $query)) {
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
        }       
        
} while ($i < 3000000);

mysqli_close($conn);

?>
