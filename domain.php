<?php
set_time_limit(0);
include('db.php');
$conn = db_connect_domain();
$amz = "http://pool.com/Downloads/PoolDeletingDomainsList.zip";
$file = "PoolDeletingDomainsList.zip";
$filecsv = "PoolDeletingDomainsList.txt";
$wget = "wget -N ".$amz;
system($wget);
$gunzip = "unzip -o ";
$gunzipcommand = $gunzip.$file;
system($gunzipcommand);
$row = 1;
if (($handle = fopen($filecsv, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
		$domain = $data[0];
		$timestamp = $data[1];
		$location = $data[2];
		if ($stmt = mysqli_prepare($conn, "INSERT IGNORE INTO `domain`.`name` (`name`, `timestamp`, `location`) VALUES (?,?,?)")); {
			mysqli_stmt_bind_param($stmt, "sss", $domain, $timestamp, $location);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
		}
    }
    fclose($handle);
}
$rm_zip = "rm ".$file;
system($rm_zip);
$rm_file = "rm ".$filecsv;
system($rm_file);
mysqli_close($conn);
?>
