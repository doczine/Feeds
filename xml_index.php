<?php
include('db.php');
/*
<?xml version="1.0" encoding="UTF-8"?>
   <sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   <sitemap>
      <loc>http://www.example.com/sitemap1.xml.gz</loc>
      <lastmod>2004-10-01T18:23:17+00:00</lastmod>
   </sitemap>
   <sitemap>
      <loc>http://www.example.com/sitemap2.xml.gz</loc>
      <lastmod>2005-01-01</lastmod>
   </sitemap>
   </sitemapindex>
*/
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
echo "<?xml version='1.0' encoding='UTF-8'?>";
echo "<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>";
$query = "SELECT `system_file_name`, `short_name`, `file_timestamp` FROM `docunator`.`file` WHERE `file`.`google_index` IS NULL LIMIT 25000;";
if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $system_file_name, $short_name, $file_timestamp);

    while (mysqli_stmt_fetch($stmt)) {
        echo "<url>";
	$file_pdf = "<loc>http://crackest.com/cracker/".$system_file_name."/".$short_name."pdf"."</loc>";
	echo $file_pdf;
	echo "</url>";
	echo "<url>";
	$file_html = "<loc>http://crackest.com/".$system_file_name.".html</loc>";
	echo $file_html;
	echo "</url>";
	$query = "UPDATE `docunator`.`file` SET `google_index` = 'Y' WHERE `file`.`system_file_name` = '".$system_file_name."';";
	if ($stmt1 = mysqli_prepare($conn1, $query)) {
    		mysqli_stmt_execute($stmt1);
    		mysqli_stmt_close($stmt1);
		}
	}
    mysqli_stmt_close($stmt);
}
echo "</urlset>";
?>
