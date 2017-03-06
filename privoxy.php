<?php
//Install Privoxy on Ubuntu using: sudo apt-get install privoxy
//Using CURL to access TOR IPs using Privoxy in Ubuntu
//Test to see if Privoxy is listening on port 8118: netstat -ant | grep 8118
function fetchUrl($url, $proxy = NULL, $post_data = NULL, $timeout = 30, $userpass = NULL) {
        $rand = rand(1, 2);
        if($rand = 1){
                $proxy = "127.0.0.1:8118";
        }
        if($rand = 2){
                $proxy = "127.0.0.1:8118";
        }
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.12) Gecko/20101026 Firefox/3.6.12');
        curl_setopt($curl, CURLOPT_URL, $url);
        if ($post_data !== NULL) {
                curl_setopt($curl, CURLOPT_POST, TRUE);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        }
        if ($proxy != NULL) {
                curl_setopt($curl, CURLOPT_PROXY, $proxy);
        }
        if ($userpass != NULL) {
                curl_setopt($curl, CURLOPT_USERPWD, $userpass);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 5);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        $hlength  = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $contents = curl_exec($curl);
	echo $contents;
        curl_close($curl);

}
$url = 'http://3g2upl4pq6kufc4m.onion/';
fetchUrl($url);
?>
