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
$word = 'billion';
}
$date = date("Y-m-d");
$date = "2017-03-23";
$file_folder_name = "/mnt/data/search/".$date;
mkdir($file_folder_name, 0777);
chmod($file_folder_name, 0777);
$url = "/mnt/data/search/".$date."/".$word."_file.txt";
$body = file_get_contents($url);
$term = $word;
$span = 3;
//print_r($matches);
//sudo openssl genrsa -out feeds.blue.key 4096

//sudo openssl req -new -key feeds.blue.key -out feeds.blue.csr -sha512
//sudo openssl x509 -req -days 365 -in feeds.blue.csr -signkey feeds.blue.key -out feeds.blue.crt -sha512

$needle = $term;
$lastPos = 0;
$positions = array();

while (($lastPos = strpos($body, $needle, $lastPos))!== false) {
	$seed = $lastPos;
    $positions[] = $lastPos;
    $lastPos = $lastPos + strlen($needle);
}
$snippet1 = "";
foreach ($positions as $value) {
        $pos1 = $value + 75;
        $pos2 = $value - 25;
        $snippet = substr($body, $pos2, 200);
echo $snippet."<br>";
	$snippet1 = $snippet1.$snippet;
}
$term = "/mnt/data/search/".$date."/".$term."_file_snippet.txt";
file_put_contents($term,$snippet1);

?>
