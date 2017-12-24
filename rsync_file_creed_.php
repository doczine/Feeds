<?php
//require("db.php");
//$conn = db_connect_scraper_100();

$file = file_get_contents("/home/rsync/home/asdf.txt");
$delimiter = "\n";
$splitcontents = explode($delimiter, $file);
//print_r($splitcontents);

$name = rand(0, 100000000).".txt";
$fp1 = fopen($name, 'a+');
$file2 = file_get_contents($name);


foreach($splitcontents as $val) {
    $doc = $val;
    $title = "NULL";
//    echo $result;
    

/*
$curl = "curl 'http://localhost:8080/solr/techproducts/update/extract?literal.id=".$doc."&commit=true' -F 'myfile=@/home/rsync/home/".$doc."/".$doc."' sleep .001> /dev/null&
";
*/
$curl = "/opt/solr/bin/post -c techproducts -filetypes '*' /home/rsync/home/".$doc."/".$doc."
";
//echo $curl;
//die();
//system($curl);
//curl http://localhost:8080/solr/techproducts/update/csv --data-binary @64699283.txt -H 'Content-type:text/plain; charset=utf-8'
///opt/solr/bin/solr restart -p 8080 -s "/opt/solr/example/techproducts/solr" -m 12g
//http://localhost:8080/solr/techproducts/select?q=test&fl=id&wt=csv

///opt/solr/bin/solr/conf/solrconfig.xml
////opt/solr/example/techproducts/solr/conf/solrconfig.xml

///opt/solr/example/techproducts/solr/solrconfig.xml
///opt/solr/example/techproducts/solr/solrconfig.xml

////opt/solr/bin/post -c techproducts /home/rsync/home/1474978438_03a1a968c7/1474978438_03a1a968c7 -params "literal.id=1474978438_03a1a968c7&uprefix=attr_"

//streamripper http://kfi-am.akacast.akamaistream.net/7/121/19771/v1/auth.akacast.akamaistream.net/kfi-am.m3u -r 8000

fwrite($fp1, $curl);
 		
}
?>

