<?php
include('db.php');
function mysql_escape_mimic($inp) {
    if(is_array($inp))
        return array_map(__METHOD__, $inp);
    if(!empty($inp) && is_string($inp)) {
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array(' ', ' ', ' ', ' ', '', '', ''), $inp);
    }
    return $inp;
}
$conn = db_connect_100();
$conn1 = db_connect_100();
$conn2 = db_connect_100();
$query = "SELECT `system_file_name`, `short_name` FROM `docunator`.`file`;";
if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $system_file_name, $short_name);

    while (mysqli_stmt_fetch($stmt)) {
        $file_open = "/var/www/html/bigdata/".$system_file_name."/".$short_name."txt";
		$file_text = "slug";
		try {
		    $file_text = file_get_contents($file_open);
		}
		catch (Exception $e) {
			$file_text = "slug";
		}
	        $file_text = mysql_escape_mimic($file_text);
			if ($stmt1 = mysqli_prepare($conn1, "INSERT INTO `docunator`.`file_search` (`system_file_name`,`file_blob`) VALUES (?,?)")); {
            		mysqli_stmt_bind_param($stmt1, "ss", $system_file_name, $file_text);
            		mysqli_stmt_execute($stmt1);
            		mysqli_stmt_close($stmt1);
			}

	}
    mysqli_stmt_close($stmt);
}
?>
