<?php
@set_time_limit(0);
// Report all PHP errors (see changelog)
error_reporting(E_ALL);

include("db.php");
$conn = db_connect_100();

    $query = "SELECT `system_file_name` FROM `docunator`.`file` WHERE `file`.`file_title` = 'text/html' AND `file`.`search_index` IS NULL LIMIT 1;";

    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $system_file_name);
        while (mysqli_stmt_fetch($stmt)) {

        }
        mysqli_stmt_close($stmt);
    }
    
    $query = "UPDATE `docunator`.`file` SET `search_index` = 'Y' WHERE `file`.`system_file_name` = '".$system_file_name."';";

    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    //http://localhost:8983/solr/techproducts/select?q=id:SP2514N

//scp /var/www/html/space/".$system_file_name."/".$system_file_name root@88.198.65.4:/home
    
    $file = "sshpass -p 'qxC1001101001A7' scp /var/www/2017-08-01.sql root@138.201.224.77:/home/2017-08-01.sql
    
    mysql -u root -p3h4xb0011011001tCiK
 	system($file);
echo $file;
   $curl = "curl 'http://88.198.65.4/index_solr.php?doc=".$system_file_name."'";
    system($curl);    

mysqli_close($conn);
"
?>




