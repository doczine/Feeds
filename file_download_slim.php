<?php
ini_set('max_execution_time', 0);
/*
-- ----------------------------
--  Table structure for `file`
-- ----------------------------
DROP TABLE IF EXISTS `file`;
CREATE TABLE `file` (
  `system_file_name` varchar(25) NOT NULL,
  `file_size` varchar(20) NOT NULL,
  `file_timestamp` datetime NOT NULL,
  `file_mime_type` varchar(45) NOT NULL,
  `file_extension` varchar(45) NOT NULL,
  `file_title` varchar(255) NOT NULL,  
  `url` text NOT NULL,
  `seoterm` varchar(100) NOT NULL,
  `short_name` varchar(100) NOT NULL,
  PRIMARY KEY (`system_file_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Primary file table spawns FKeys';

6200353
Verification Code: ECYip3lpa7zXFjy0dahhjrVCXEcl3rmNH8fKCAb5OTE10XCjQFVNdDmCkHj1E7of
Access Mask: 4294967295
Expires: Never

D-IZT9
*/
function db_connect_scraper_100()
{
   $result = new mysqli('192.168.1.100', 'docunator', 'X23n7dkpP42x7M4LH', 'scraper', 3306); 
   if (!$result)
     throw new Exception('Could not connect to database server');
   else
     return $result;
}
function db_connect_100()
{
   $result = new mysqli('192.168.1.100', 'docunator', 'X23n7dkpP42x7M4LH', 'docunator', 3306); 
   if (!$result) 
     throw new Exception('Could not connect to database server');
   else
     return $result;
}
$conn1 = db_connect_scraper_100();
$conn = db_connect_100();
function mysql_escape_mimic($inp) {
    if(is_array($inp))
        return array_map(__METHOD__, $inp);
    if(!empty($inp) && is_string($inp)) {
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('', '', '', '', '', '', ''), $inp);
    }
    return $inp;
} 
function namefile($fileextension)
{
    return time() ."_". substr(md5(microtime()), 0, mt_rand(10, 10));
}
function error_msg($text) {
     $hello_var = 'Problem: '; //example of addon to beginning
     $goodbye_var = ' goodbye'; //example of addon to end
     die($hello_var.'<br />'.$text.'<br />'.$goodbye_var);
} 
function fetchUrl($uri) {
    $handle = curl_init();
    curl_setopt($handle, CURLOPT_URL, $uri);
    curl_setopt($handle, CURLOPT_POST, false);
    curl_setopt($handle, CURLOPT_BINARYTRANSFER, false);
    curl_setopt($handle, CURLOPT_HEADER, true);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 10);
    $response = curl_exec($handle);
    $hlength  = curl_getinfo($handle, CURLINFO_HEADER_SIZE);
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    $body     = substr($response, $hlength);
    // If HTTP response is not 200, throw exception
    if ($httpCode != 200) {
        throw new Exception($httpCode);
    }
    return $body;
}
function user_file_name($file,$length=-1)
{
    $p = strrpos($file,"/");
    $p++;
        if($length!=-1)
        {
            $ext = substr($file,$p,$length);
        }
        if($length==-1)
        {
            $ext = substr($file,$p);
        }
    $ext = strtolower($ext);
    return $ext;
}
$query = "SELECT `urlcounter`, `title`, `url`, `host`, `seoterm`, `date` FROM `scraper`.`results` WHERE `results`.`converted` IS NULL AND `results`.`urlcounter` LIKE '%".$s."%' limit 1;";
if ($stmt = mysqli_prepare($conn1, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $urlcounter, $title, $url, $host, $seoterm, $date);
    while (mysqli_stmt_fetch($stmt)) {
        echo $urlcounter;
    }
    mysqli_stmt_close($stmt);
}
$query = "UPDATE `scraper`.`results` SET `converted` = 'Y' WHERE `results`.`urlcounter` = '".$urlcounter."';";
if ($stmt = mysqli_prepare($conn1, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
$url = str_replace("'", "''", $url);
$urlfixed = str_replace("'", "%27", $url);
$title = str_replace("'", "", $title);
$urlfixed = mysqli_real_escape_string($conn, $urlfixed);
$remoteFile = $url;
$ch = curl_init($remoteFile);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); //not necessary unless the file redirects (like the PHP example we're using here)
$data = curl_exec($ch);
curl_close($ch);
    if ($data === false) {
      echo 'cURL failed';
      exit;
    }
$status = 'unknown';
    if (preg_match('/^HTTP\/1\.[01] (\d\d\d)/', $data, $matches)) {
      $status = (int)$matches[1];
    }
    if (preg_match('/Content-Length: (\d+)/', $data, $matches)) {
      $contentLength = (int)$matches[1];
    }
if ($contentLength > 30000001) {
        echo 'The file is too large';
        error_msg('File too large!');
}
if ($contentLength < 2000) {
        echo 'The file is too small';
        error_msg('File too small!');
}
try {
    $filepage = fetchUrl($urlfixed);
} 
catch (Exception $e)
{
        echo 'The file url failed';
        $rm_folder = "rm -R -f ".$file_folder_name;
        system($rm_folder, $retrm);
        error_msg('File link failed!');
}


$seoterm = mysqli_real_escape_string($conn, $seoterm);
$description = "We work for the freedom of the webs.";
$user_ip = $_SERVER['SERVER_ADDR'];
$mysqltime = date("Y-m-d H:i:s");
$valid = true;
$file_extension = "pdf";
$folderName = namefile($file_extension); //system_file_name
$file_folder_name = "/var/www/ramdrive/".$folderName;
$bigdata_folder_name = "/var/www/bigdata/".$rand_folder."/".$folderName;
mkdir($file_folder_name, 0777);
chmod($file_folder_name, 0777);
$file_mime_type = "application/pdf";
$file_title = $title;
$user_file_name = user_file_name($url);
$new_file_name = str_replace(" ", "_", $user_file_name);
$new_file_name = mysql_escape_mimic($new_file_name);
$short_file_name = $new_file_name;
$short_file_name = str_replace($file_extension, "", $short_file_name);
$destination_file = "/var/www/ramdrive/".$folderName."/".$new_file_name;
$lfhandler = fopen($destination_file, "w");
fwrite($lfhandler, $filepage);
fclose ($lfhandler);
//delete source file
$filename = $destination_file;
$file_folder = "/var/www/ramdrive/".$folderName."/";
$file_old = $file_folder.$new_file_name;
$command_file_name = $new_file_name;
$command_file_name = str_replace($file_extension, "", $command_file_name);
$file_new = $file_folder.$command_file_name;
$file_size = filesize($filename);
$mysqldate = date("Y-m-d");
$file_size_dup = 0;

    if(($file_size < 2000) and ($contentLength < 2000))
    {
        echo 'The file is empty';  
        $rm_folder = "rm -R -f ".$file_folder_name;
        system($rm_folder, $retrm);
        error_msg('File is empty!');         
    }
    
    elseif(($file_size > 30000001) and ($contentLength > 30000001)){
        echo 'The file is larger than 20 MB';  
        $rm_folder = "rm -R -f ".$file_folder_name;
        system($rm_folder, $retrm);
        error_msg('File is too big!');
    }
    
    elseif(($valid == true) && ($user != "")){    
    
    
        $file_new = rtrim($file_new, ".");
        $damn_file_name = str_replace(".", "", $command_file_name);
        $curlfile = rtrim($short_file_name, ".");
        $internalip = $file_folder.$curlfile;
        $array_json = mysqli_real_escape_string($conn, $fuck);
        $folderName = mysqli_real_escape_string($conn, $folderName);
        $file_size = mysqli_real_escape_string($conn, $file_size);
        $mysqltime = mysqli_real_escape_string($conn, $mysqltime);
        $file_mime_type = mysqli_real_escape_string($conn, $file_mime_type);
        $file_extension = mysqli_real_escape_string($conn, $file_extension);
        $folderName = mysqli_real_escape_string($conn, $folderName);
        $cmd_result = mysqli_real_escape_string($conn, $cmd_result);
        $folderName = mysqli_real_escape_string($conn, $folderName);
        $file_title = mysqli_real_escape_string($conn, $file_title);
        $description = mysqli_real_escape_string($conn, $description);
        $folderName = mysqli_real_escape_string($conn, $folderName);
        $category = mysqli_real_escape_string($conn, $category);
        $folderName = mysqli_real_escape_string($conn, $folderName);
        $rights = mysqli_real_escape_string($conn, $rights);
        $user = mysqli_real_escape_string($conn, $user);
        $folderName = mysqli_real_escape_string($conn, $folderName);
        $new_file_name = mysqli_real_escape_string($conn, $new_file_name);
        $short_file_name = mysqli_real_escape_string($conn, $short_file_name);
        $user_ip = mysqli_real_escape_string($conn, $user_ip);
        $folderName = mysqli_real_escape_string($conn, $folderName);
        $hitcounter = mysqli_real_escape_string($conn, $hitcounter);
        
		$pdf_text = "pdftotext ".$file_new.".pdf ".$file_new.".txt";
		echo $pdf_text;
		system($pdf_text, $retval5);
        
//`system_file_name`,`file_size`,`file_timestamp`,`file_mime_type`,`file_extension`,`file_title`,`file_description`,`url`,`seoterm`, `short_name`, `file_extension`
        if ($stmt = mysqli_prepare($conn, "INSERT INTO `docunator`.`file` (`system_file_name`,`file_size`,`file_timestamp`,`file_mime_type`,`file_extension`, `file_title`, `url`, `seoterm`, `short_name`) VALUES (?,?,?,?,?,?,?,?,?)")); {
            mysqli_stmt_bind_param($stmt, "ssssssssss", $folderName, $file_size, $mysqltime, $file_mime_type, $file_extension, $file_title, $urlfixed, $seoterm, $short_file_name, $file_extension);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
/*`

$folderName = $name 

system_file_name
file_size
file_timestamp
file_mime_type
file_extension
file_title
url
seoterm
short_name

-- ----------------------------
--  Table structure for `file`
-- ----------------------------
DROP TABLE IF EXISTS `file`;
CREATE TABLE `file` (
  `system_file_name` varchar(25) NOT NULL,
  `file_size` varchar(20) NOT NULL,
  `file_timestamp` datetime NOT NULL,
  `file_mime_type` varchar(45) NOT NULL,
  `file_extension` varchar(45) NOT NULL,
  `file_title` varchar(255) NOT NULL,  
  `url` text NOT NULL,
  `seoterm` varchar(100) NOT NULL,
  `short_name` varchar(100) NOT NULL,
  PRIMARY KEY (`system_file_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Primary file table';
*/

<?php
include("db.php");
$conn = db_connect_100();
$joe = $_SERVER['SERVER_NAME'];
$doc = strip_tags(stripslashes($_GET['doc']));
$query = "SELECT `system_file_name`, `short_name`, `file_title`, `url`, `seoterm`, `file_timestamp`, `counter` FROM `docunator`.`file` WHERE `file`.`system_file_name` = '".$doc."';";
if (is_numeric($doc)) {
		$query = "SELECT `system_file_name`, `short_name`, `file_title`, `url`, `seoterm`, `file_timestamp`, `counter` FROM `docunator`.`file` WHERE `file`.`counter` = '".$doc."';";
//echo $query;
}
if ($stmt = mysqli_prepare($conn, $query)) {
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $system_file_name, $short_name, $file_title, $url, $seoterm, $file_timestamp, $counter);
	while (mysqli_stmt_fetch($stmt)) {
				$doc = $system_file_name;
				
				$file = "space/".$system_file_name."/".$system_file_name;
				echo $counter."<br>";
				echo $file_title."<br>";
				echo $url."<br>";
				echo $file_timestamp."<br>";
				$text = "<a href='".$file."'>".$system_file_name."</a><br>";

		}
	mysqli_stmt_close($stmt);
}

?>
//†

/*



*/

    }
    else 
    {
      echo "Invalid File Format, or captcha"; 
        echo 'Something failed bad, this is the catchall.';
        $rm_folder = "rm -R -f ".$file_folder_name;
        system($rm_folder, $retrm);
        error_msg('File already scraped!');    
       
}

mysqli_close($conn);
mysqli_close($conn1);
?>
