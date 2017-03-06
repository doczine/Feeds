<?php
// Turn off all error reporting
//error_reporting(0);

header('Content-type: application/xml');
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'http://demonry.com:8080/solr/techproducts/browse?&q=%22call+center%22&wt=xml');
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
            $json = curl_exec($ch);
            curl_close($ch);
//            $json = json_encode($data);
//	print_r(json_decode($json, true));
			echo $json;
?>
