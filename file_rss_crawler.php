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
*/
function db_connect_scraper_100()
{
   $result = new mysqli('localhost', 'root', '3h4xb0011011001tCiK', 'scraper'); 
   if (!$result)
     throw new Exception('Could not connect to database server');
   else
     return $result;
}
function db_connect_100()
{
   $result = new mysqli('localhost', 'root', '3h4xb0011011001tCiK', 'docunator'); 
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

class MimeStreamWrapper
{
    const WRAPPER_NAME = 'mime';
    public $context;
    private static $isRegistered = false;
    private $callBackFunction;
    private $eof = false;
    private $fp;
    private $path;
    private $fileStat;
    private function getStat()
    {
        if ($fStat = fstat($this->fp)) {
            return $fStat;
        }

        $size = 100;
        if ($headers = get_headers($this->path, true)) {
            $head = array_change_key_case($headers, CASE_LOWER);
            $size = (int)$head['content-length'];
        }
        $blocks = ceil($size / 512);
        return array(
            'dev' => 16777220,
            'ino' => 15764,
            'mode' => 33188,
            'nlink' => 1,
            'uid' => 10000,
            'gid' => 80,
            'rdev' => 0,
            'size' => $size,
            'atime' => 0,
            'mtime' => 0,
            'ctime' => 0,
            'blksize' => 4096,
            'blocks' => $blocks,
        );
    }
    public function setPath($path)
    {
        $this->path = $path;
        $this->fp = fopen($this->path, 'rb') or die('Cannot open file:  ' . $this->path);
        $this->fileStat = $this->getStat();
    }
    public function read($count) {
        return fread($this->fp, $count);
    }
    public function getStreamPath()
    {
        return str_replace(array('ftp://', 'http://', 'https://'), self::WRAPPER_NAME . '://', $this->path);
    }
    public function getContext()
    {
        if (!self::$isRegistered) {
            stream_wrapper_register(self::WRAPPER_NAME, get_class());
            self::$isRegistered = true;
        }
        return stream_context_create(
            array(
                self::WRAPPER_NAME => array(
                    'cb' => array($this, 'read'),
                    'fileStat' => $this->fileStat,
                )
            )
        );
    }
    public function stream_open($path, $mode, $options, &$opened_path)
    {
        if (!preg_match('/^r[bt]?$/', $mode) || !$this->context) {
            return false;
        }
        $opt = stream_context_get_options($this->context);
        if (!is_array($opt[self::WRAPPER_NAME]) ||
            !isset($opt[self::WRAPPER_NAME]['cb']) ||
            !is_callable($opt[self::WRAPPER_NAME]['cb'])
        ) {
            return false;
        }
        $this->callBackFunction = $opt[self::WRAPPER_NAME]['cb'];
        $this->fileStat = $opt[self::WRAPPER_NAME]['fileStat'];

        return true;
    }
    public function stream_read($count)
    {
        if ($this->eof || !$count) {
            return '';
        }
        if (($s = call_user_func($this->callBackFunction, $count)) == '') {
            $this->eof = true;
        }
        return $s;
    }
    public function stream_eof()
    {
        return $this->eof;
    }
    public function stream_stat()
    {
        return $this->fileStat;
    }
    public function stream_cast($castAs)
    {
        $read = null;
        $write  = null;
        $except = null;
        return @stream_select($read, $write, $except, $castAs);
    }
}

//3251676
//4414468
//4474814
$random = rand(0, 21474);
$random1 = $random + 100;
$s = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 1)), 0, 1);
echo $s;
$query = "SELECT `title`, `url`,  `date`, `system_file_name`, `counter` FROM `scraper`.`feed` WHERE `feed`.`counter` BETWEEN ".$random." AND ".$random1." or `feed`.`checked` IS NULL LIMIT 1;";
echo $query;
if ($stmt = mysqli_prepare($conn1, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $title, $url, $date, $system_file_name_rss, $urlcounter);
    while (mysqli_stmt_fetch($stmt)) {
    }
    mysqli_stmt_close($stmt);
}

$query = "UPDATE `scraper`.`feed` SET `feed`.`checked` = 'Y' WHERE `feed`.`counter` = '".$urlcounter."';";
echo $query;
if ($stmt = mysqli_prepare($conn1, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
$url = str_replace(" ", "%20", $url);
echo $url;

$path = $url;

echo "File: ", $path, "\n";
$wrapper = new MimeStreamWrapper();
$wrapper->setPath($path);

$fInfo = new finfo(FILEINFO_MIME);

$file_mime = $fInfo->file($wrapper->getStreamPath(), FILEINFO_MIME_TYPE, $wrapper->getContext());
echo $file_mime;

if($file_mime == "image/png") {
error_msg('File type failed!');
}
if($file_mime == "image/jpeg") {
error_msg('File type failed!');
}
if($file_mime == "image/gif") {
error_msg('File type failed!');
}
if($file_mime == "image/jp2") {
error_msg('File type failed!');
}

/*
$query = "SELECT `urlcounter`, `title`, `url`, `host`, `seoterm`, `date` FROM `scraper`.`results` WHERE `results`.`converted` IS NULL limit 1;";
if ($stmt = mysqli_prepare($conn1, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $urlcounter, $title, $url, $host, $seoterm, $date);
    while (mysqli_stmt_fetch($stmt)) {
        echo $urlcounter;
    }
    mysqli_stmt_close($stmt);
}
*/

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
/*
if ($contentLength > 30000001) {
        echo 'The file is too large';
        error_msg('File too large!');
}
if ($contentLength < 2000) {
        echo 'The file is too small';
        error_msg('File too small!');
}
*/
try {
    $filepage = fetchUrl($urlfixed);
} 
catch (Exception $e)
{
        echo 'The file url failed';
        error_msg('File link failed!');
}


$seoterm = mysqli_real_escape_string($conn, $seoterm);
$description = "We work for the freedom of the webs.";
$user_ip = '127.0.0.1';
$mysqltime = date("Y-m-d H:i:s");
$valid = true;
$file_extension = "pdf";
$folderName = $system_file_name_rss; //system_file_name
$file_folder_name = "/var/www/html/space/".$folderName;
$bigdata_folder_name = "/var/www/html/space/".$folderName;
mkdir($file_folder_name, 0777);
chmod($file_folder_name, 0777);
$file_mime_type = "application/pdf";
$file_title = $title;
$user_file_name = user_file_name($url);
$new_file_name = str_replace(" ", "_", $user_file_name);
$new_file_name = mysql_escape_mimic($new_file_name);
$short_file_name = $new_file_name;
$short_file_name = str_replace($file_extension, "", $short_file_name);
$destination_file = "/var/www/html/space/".$folderName."/".$folderName;
$lfhandler = fopen($destination_file, "w");
fwrite($lfhandler, $filepage);
fclose ($lfhandler);
//delete source file
$filename = $destination_file;
$file_folder = "/var/www/html/space/".$folderName."/";
$file_old = $file_folder.$new_file_name;
$command_file_name = $new_file_name;
$command_file_name = str_replace($file_extension, "", $command_file_name);
$file_new = $file_folder.$command_file_name;
$file_size = filesize($filename);
$mysqldate = date("Y-m-d");
$file_size_dup = 0;
$user = 'asdf';
echo $destination_file;
    if($file_size < 20)
    {
        echo 'The file is empty';  
        $rm_folder = "rm -R -f ".$file_folder_name;
        system($rm_folder, $retrm);
        error_msg('File is empty!');         
    }
    
    elseif($file_size > 30000001){
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
        $folderName = mysqli_real_escape_string($conn, $folderName);
        $file_size = mysqli_real_escape_string($conn, $file_size);
        $mysqltime = mysqli_real_escape_string($conn, $mysqltime);
        $file_mime_type = mysqli_real_escape_string($conn, $file_mime_type);
        $file_extension = mysqli_real_escape_string($conn, $file_extension);
        $folderName = mysqli_real_escape_string($conn, $folderName);
        $folderName = mysqli_real_escape_string($conn, $folderName);
        $file_title = $file_mime;
        $description = mysqli_real_escape_string($conn, $description);
        $folderName = mysqli_real_escape_string($conn, $folderName);
        $folderName = mysqli_real_escape_string($conn, $folderName);
        $user = mysqli_real_escape_string($conn, $user);
        $folderName = mysqli_real_escape_string($conn, $folderName);
        $new_file_name = mysqli_real_escape_string($conn, $new_file_name);
        $short_file_name = mysqli_real_escape_string($conn, $short_file_name);
        $user_ip = mysqli_real_escape_string($conn, $user_ip);
        $folderName = mysqli_real_escape_string($conn, $folderName);
        
//		$pdf_text = "pdftotext ".$file_new.".pdf ".$file_new.".txt";
//		echo $pdf_text;
//		system($pdf_text, $retval5);
        
//`system_file_name`,`file_size`,`file_timestamp`,`file_mime_type`,`file_extension`,`file_title`,`file_description`,`url`,`seoterm`, `short_name`, `file_extension`
        if ($stmt = mysqli_prepare($conn, "INSERT INTO `docunator`.`file` (`system_file_name`,`file_size`,`file_timestamp`,`file_mime_type`,`file_extension`, `file_title`, `url`, `seoterm`, `short_name`) VALUES (?,?,?,?,?,?,?,?,?)")); {
            mysqli_stmt_bind_param($stmt, "sssssssss", $folderName, $file_size, $mysqltime, $file_mime_type, $file_extension, $file_title, $urlfixed, $seoterm, $short_file_name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Primary file table';
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
