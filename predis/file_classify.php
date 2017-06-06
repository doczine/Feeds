<?php

include('/var/www/html/db.php');
$conn = db_connect_100();

function get_extension($file,$length=-1)
{
        $p = strrpos($file,".");   
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

$query = "SELECT `system_file_name`, `file_timestamp`, `url` FROM `docunator`.`file` WHERE `file`.`file_mime_type` = 'html';";
if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $system_file_name, $file_timestamp, $url);
    while (mysqli_stmt_fetch($stmt)) {
    }
    mysqli_stmt_close($stmt);
}
$dt = new DateTime($file_timestamp);
$date1 = $dt->format('Y-m-d');
$interval = $dt->diff(new DateTime());
$path = "/var/www/html/file/".$date1."/".$system_file_name."/".$system_file_name;
echo "File: ", $path, "\n";
$wrapper = new MimeStreamWrapper();
$wrapper->setPath($path);
$fInfo = new finfo(FILEINFO_MIME);
$file_mime = $fInfo->file($wrapper->getStreamPath(), FILEINFO_MIME_TYPE, $wrapper->getContext());
echo $file_mime;

$ext = get_extension($url);

$query = "UPDATE `docunator`.`file` SET `file_mime_type` = '".$file_mime."' WHERE `file`.`system_file_name` = '".$system_file_name."';";
if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
$query = "UPDATE `docunator`.`file` SET `file_extension` = '".$ext."' WHERE `file`.`system_file_name` = '".$system_file_name."';";
if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

?>
