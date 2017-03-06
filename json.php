<?php
// Turn off all error reporting
//error_reporting(0);

header('Content-type: application/json');
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'http://crackest.com:8080/solr/techproducts/browse?&q=id%3A1425568462_9119fe9844&wt=json');
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
            $json = curl_exec($ch);
            curl_close($ch);
//            $json = json_encode($data);
//	print_r(json_decode($json, true));

$json = ereg_replace ("/\r\n|\n\r|\r|\n/", "", $json);
$json = str_replace("/\n", "", $json);
$json = str_replace(array("\n", "\r"), "", $json);
$json = trim(preg_replace("/\s+/", "", $json));
$json = trim(preg_replace("/\s\s+/", "", $json));
$json = preg_replace("@[\s]{2,}@","",$json);
$json = preg_replace("~[\r\n\t]+~", "", $json);
$json = preg_replace('@[\s]{2,}@',' ',$json);
$json = str_replace(array("\r\n","\r", "\n"),"",$json);
		echo $json;
?>
