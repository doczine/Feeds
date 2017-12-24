<?php

if(isset($_GET['word'])){
$word = strip_tags(stripslashes($_GET["word"]));
}
elseif(isset($argv[1]))
{
$word = $argv[1];
}
else
{
$word = 'internet';
}

//$word = strip_tags(stripslashes($_GET["word"]));
$date = date("Y-m-d");
$date = "2017-03-23";
$file_folder_name = "/mnt/data/search/".$date;
mkdir($file_folder_name, 0777);
chmod($file_folder_name, 0777);
$url = "/mnt/data/search/".$date."/".$word."_file.txt";
$body = file_get_contents($url);

$subject = $body;
$pattern= "/(\w+\s){4}".$word."(\s\w+){4}/";

preg_match_all($pattern, $subject, $matches);

foreach($matches as $key => $value)
{
echo $value."<br>";
}

foreach($matches as $item) {
    echo $item['filename'];
    echo $item['filepath'];

    // to know what's in $item
    echo '<pre>'; var_dump($item);
echo "<br>";
}

?>
