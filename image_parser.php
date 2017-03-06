<?php

$jsrc = "https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=test";
$json = file_get_contents($jsrc);
$jset = json_decode($json, true);
echo $jset["responseData"]["results"][0]["url"];
?>
       
$json_output = json_decode($json); // Now the JSON is an associative array
 
foreach ($json_output['responseData']['results'] as $result)
{
    echo $result['url'] . '<br />';
}

?>
