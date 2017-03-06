<?php
/* License: open source for private and commercial use
   This code is free to use and modify as long as this comment stays untouched on top.
   URL of original source: http://google-rank-checker.squabbel.com
   Author of original source: justone@squabbel.com
   This tool should be completely legal but in any case you may not sue or seek compensation from the original Author for any damages or legal issues the use may cause.
   By using this source code you agree NOT to increase the request rates beyond the IP management function limitations, this would only harm our common cause.
 */

function process_raw($htmdata,$page,$search_string) // process the html and put results into $serp_data
{
	global $process_result; // contains metainformation from the process_raw() function
	global $test_100_resultpage;
	global $NL;
	global $B;
	global $B_;
	
	
	$dom = new domDocument; 
	$dom->strictErrorChecking = false; 
	$dom->preserveWhiteSpace = true; 
	@$dom->loadHTML($htmdata); 
	$lists=$dom->getElementsByTagName('li'); 
  $num=0;
	
	$results=array();
	foreach ($lists as $list)
	{
		unset($ar);unset($divs);unset($div);unset($cont);unset($result);unset($tmp);
		$ar=dom2array_full($list);			
		if (count($ar) < 2) 
		{
			verbose("s");
			continue; // skipping advertisements
		}
		if ((!isset($ar['class'])) || ($ar['class'] != 'g')) 
		{
			verbose("x");
			continue; // skipping non-search result entries
		}
	
		// adaption to new google layout
		if (isset($ar['div'][1]))
			$ar['div']=$ar['div'][0];
		if (isset($ar['div'][1]))
			$ar['div']=$ar['div'][0];
		//$ar=$ar['div']['span']; // changes 2011 - Google changed layout
		//$ar=$ar['div']; // changes 2011 - Google changed layout // change again, 2012-2013
		$orig_ar=$ar; // 2012-2013
		// adaption finished
	
		$divs=$list->getElementsByTagName('div');
		$div=$divs->item(1);
		getContent($cont,$div);	
		
		$num++;
		$result['title']=$ar['h3']['a']['textContent'];
		
		$tmp=strstr($ar['h3']['a']['@attributes']['href'],"http");
		$result['url']=$tmp;
		if (strstr($ar['h3']['a']['@attributes']['href'],"interstitial")) echo "!";
		
		$tmp=parse_url($result['url']);
		$result['host']=$tmp['host'];

		$desc=strstr($cont,"<span class='st'>"); // instead of using DOM the string is parsed traditional due to frequent layout changes by Google
		$desc=substr($desc,17);
		$desc=strip_tags($desc);
		$result['desc']=$desc;
		
		// 2012-2013 addon, might be extended with on request
		if (isset($ar['table']) && (strlen($result['title'] < 2))) // special mode -  embedded video or similar
		{
			// if interesting the object can be parsed here
			$result['title']="embedded object";
			$result['url']="embedded object";
		}
	
		//echo "$B Result parsed:$B_ $result[title]$NL";
		verbose("r");
		flush();					
		$results[]=$result; // This adds the result to our large result array
	}
	verbose(" !$NL");
  
	// Analyze if more results are available (next page)
	$next=0;
	$tables=$dom->getElementsByTagName('table');
	if (strstr($htmdata,"Next</a>")) $next=1;
	else
	{
		if ($test_100_resultpage)
			$needstart=($page+1)*100;
		else
			$needstart=($page+1)*10;
		$findstr="start=$needstart";
		if (strstr($htmdata,$findstr)) $next=1;
	}
	$page++;
	if ($next) 
	{
		$process_result="PROCESS_SUCCESS_MORE"; // more data available
	} else
		$process_result="PROCESS_SUCCESS_LAST"; // last page reached

	var_dump($results);
		$myNewArray = $results;
		$last = count($myNewArray) - 1;
		foreach ($myNewArray as $i => $row)
		{
			$isFirst = ($i == 0);
			$isLast = ($i == $last);
			$title = $row['title'];
			$trim = $row['url'];
			$host = $row['host'];
			$trimmed = $row['url'];
			$strlen = strlen($trimmed);
			$length = strrpos($trimmed, '&sa=');
				if ($length === FALSE) {
				  $length = $strlen;
				}
			$conn = db_connect();
			$result = substr($trimmed, 0, $length);
			$result = str_replace("'", "%27", $result);
			$title = mysqli_real_escape_string($conn, $title);
			$host = mysqli_real_escape_string($conn, $host);
			$search_string = urldecode($search_string);	
			$search_string = mysqli_real_escape_string($conn, $search_string);	
			$mysqltime = date("Y-m-d H:i:s");
			$keyurl = substr($result, 0, 200);

			if ($stmt = mysqli_prepare($conn, "INSERT INTO `scraper`.`results` (`urlcounter`, `title`, `url`, `host`, `seoterm`, `date`) VALUES (?,?,?,?,?,?)")); {
				mysqli_stmt_bind_param($stmt, "ssssss", $keyurl, $title, $result, $host, $search_string, $mysqltime);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_close($stmt);
			}
		}
		print_r($results);
	return $results;
}


function fetchUrl($url, $proxy = NULL, $post_data = NULL, $timeout = 30, $userpass = NULL) {
$rand = rand(1, 1103);
echo "rand here ".$rand;
$proxy = "";
if($rand == 1){
$proxy = "212.200.131.83:80";
}
if($rand == 2){
$proxy = "146.159.95.141:80";
}
if($rand == 3){
$proxy = "89.46.101.122:8089";
}
if($rand == 4){
$proxy = "41.223.119.156:3128";
}
if($rand == 5){
$proxy = "88.132.82.236:8088";
}
if($rand == 6){
$proxy = "89.46.101.122:7808";
}
if($rand == 7){
$proxy = "199.200.120.140:8089";
}
if($rand == 8){
$proxy = "37.239.46.26:80";
}
if($rand == 9){
$proxy = "37.239.46.50:80";
}
if($rand == 10){
$proxy = "177.104.25.130:3128";
}
if($rand == 11){
$proxy = "37.239.46.50:80";
}
if($rand == 12){
$proxy = "199.200.120.140:7808";
}
if($rand == 13){
$proxy = "177.107.97.246:8080";
}
if($rand == 14){
$proxy = "105.235.219.18:8080";
}
if($rand == 15){
$proxy = "186.42.181.203:8080";
}
if($rand == 16){
$proxy = "200.69.206.157:8080";
}
if($rand == 17){
$proxy = "180.211.183.134:8080";
}
if($rand == 18){
$proxy = "61.8.70.114:8080";
}
if($rand == 19){
$proxy = "89.234.199.60:8000";
}
if($rand == 20){
$proxy = "46.10.205.103:8080";
}
if($rand == 21){
$proxy = "103.29.222.44:80";
}
if($rand == 22){
$proxy = "80.54.28.35:8080";
}
if($rand == 23){
$proxy = "202.53.254.99:8080";
}
if($rand == 24){
$proxy = "195.154.233.59:3128";
}
if($rand == 25){
$proxy = "89.46.233.100:8081";
}
if($rand == 26){
$proxy = "66.130.122.90:8080";
}
if($rand == 27){
$proxy = "186.167.32.115:8080";
}
if($rand == 28){
$proxy = "41.78.27.237:8080";
}
if($rand == 29){
$proxy = "92.255.197.224:8080";
}
if($rand == 30){
$proxy = "119.82.240.49:1080";
}
if($rand == 31){
$proxy = "1.179.143.178:3128";
}
if($rand == 32){
$proxy = "46.40.38.110:8080";
}
if($rand == 33){
$proxy = "95.213.128.2:80";
}
if($rand == 34){
$proxy = "118.97.144.198:8080";
}
if($rand == 35){
$proxy = "118.97.136.146:80";
}
if($rand == 36){
$proxy = "112.72.9.66:8080";
}
if($rand == 37){
$proxy = "190.4.19.250:1080";
}
if($rand == 38){
$proxy = "46.191.237.118:1080";
}
if($rand == 39){
$proxy = "222.161.248.122:80";
}
if($rand == 40){
$proxy = "187.217.191.162:3128";
}
if($rand == 41){
$proxy = "117.102.82.67:8080";
}
if($rand == 42){
$proxy = "109.104.144.42:8080";
}
if($rand == 43){
$proxy = "222.124.189.93:8080";
}
if($rand == 44){
$proxy = "202.95.139.37:80";
}
if($rand == 45){
$proxy = "91.196.230.66:3128";
}
if($rand == 46){
$proxy = "193.25.120.235:8080";
}
if($rand == 47){
$proxy = "196.41.9.169:8585";
}
if($rand == 48){
$proxy = "201.234.226.82:8080";
}
if($rand == 49){
$proxy = "202.152.5.156:80";
}
if($rand == 50){
$proxy = "119.18.153.246:8080";
}
if($rand == 51){
$proxy = "177.47.238.18:8080";
}
if($rand == 52){
$proxy = "115.127.64.58:8080";
}
if($rand == 53){
$proxy = "110.170.137.254:8080";
}
if($rand == 54){
$proxy = "118.97.144.66:8080";
}
if($rand == 55){
$proxy = "200.195.33.34:8080";
}
if($rand == 56){
$proxy = "187.73.17.1:8080";
}
if($rand == 57){
$proxy = "186.67.31.212:8080";
}
if($rand == 58){
$proxy = "61.19.82.138:8080";
}
if($rand == 59){
$proxy = "200.192.252.130:8080";
}
if($rand == 60){
$proxy = "222.124.149.179:3128";
}
if($rand == 61){
$proxy = "200.41.226.60:3128";
}
if($rand == 62){
$proxy = "173.192.79.55:80";
}
if($rand == 63){
$proxy = "203.217.170.144:80";
}
if($rand == 64){
$proxy = "212.72.133.174:80";
}
if($rand == 65){
$proxy = "176.31.239.33:8118";
}
if($rand == 66){
$proxy = "212.72.133.174:8080";
}
if($rand == 67){
$proxy = "14.139.172.170:3128";
}
if($rand == 68){
$proxy = "116.212.157.111:8080";
}
if($rand == 69){
$proxy = "24.172.34.114:8181";
}
if($rand == 70){
$proxy = "190.184.144.174:8080";
}
if($rand == 71){
$proxy = "94.247.25.163:80";
}
if($rand == 72){
$proxy = "180.250.88.173:3128";
}
if($rand == 73){
$proxy = "118.97.255.106:8080";
}
if($rand == 74){
$proxy = "91.183.124.41:80";
}
if($rand == 75){
$proxy = "196.41.9.26:8585";
}
if($rand == 76){
$proxy = "212.13.49.186:8085";
}
if($rand == 77){
$proxy = "202.79.59.110:8080";
}
if($rand == 78){
$proxy = "218.92.227.172:17183";
}
if($rand == 79){
$proxy = "218.161.34.107:8080";
}
if($rand == 80){
$proxy = "77.50.220.92:8080";
}
if($rand == 81){
$proxy = "94.100.50.54:8080";
}
if($rand == 82){
$proxy = "200.213.158.51:8080";
}
if($rand == 83){
$proxy = "195.40.6.43:3128";
}
if($rand == 84){
$proxy = "50.62.134.171:80";
}
if($rand == 85){
$proxy = "120.28.45.202:8090";
}
if($rand == 86){
$proxy = "75.126.26.180:80";
}
if($rand == 87){
$proxy = "202.106.16.36:3128";
}
if($rand == 88){
$proxy = "123.30.75.115:3128";
}
if($rand == 89){
$proxy = "54.187.52.159:3128";
}
if($rand == 90){
$proxy = "124.6.135.170:3128";
}
if($rand == 91){
$proxy = "125.209.81.149:8080";
}
if($rand == 92){
$proxy = "210.2.132.14:8080";
}
if($rand == 93){
$proxy = "134.249.139.239:8080";
}
if($rand == 94){
$proxy = "121.200.63.2:8080";
}
if($rand == 95){
$proxy = "200.43.65.91:8080";
}
if($rand == 96){
$proxy = "217.65.0.206:3129";
}
if($rand == 97){
$proxy = "212.46.199.10:8080";
}
if($rand == 98){
$proxy = "31.15.48.12:80";
}
if($rand == 99){
$proxy = "64.62.233.67:80";
}
if($rand == 100){
$proxy = "177.21.227.133:8080";
}
if($rand == 101){
$proxy = "31.28.6.13:8118";
}
if($rand == 102){
$proxy = "217.65.0.250:3129";
}
if($rand == 103){
$proxy = "212.33.246.38:3128";
}
if($rand == 104){
$proxy = "62.165.42.170:8080";
}
if($rand == 105){
$proxy = "41.72.105.38:3128";
}
if($rand == 106){
$proxy = "89.191.131.243:8080";
}
if($rand == 107){
$proxy = "82.114.78.109:8080";
}
if($rand == 108){
$proxy = "149.156.112.55:80";
}
if($rand == 109){
$proxy = "80.82.69.72:3128";
}
if($rand == 110){
$proxy = "213.151.89.71:80";
}
if($rand == 111){
$proxy = "221.231.135.149:80";
}
if($rand == 112){
$proxy = "190.151.10.226:8080";
}
if($rand == 113){
$proxy = "46.166.195.39:8080";
}
if($rand == 114){
$proxy = "41.215.7.94:8080";
}
if($rand == 115){
$proxy = "95.109.117.232:8085";
}
if($rand == 116){
$proxy = "59.90.100.57:8080";
}
if($rand == 117){
$proxy = "213.81.212.138:8080";
}
if($rand == 118){
$proxy = "213.85.92.10:80";
}
if($rand == 119){
$proxy = "115.87.176.99:8080";
}
if($rand == 120){
$proxy = "210.101.131.232:8080";
}
if($rand == 121){
$proxy = "210.101.131.231:8080";
}
if($rand == 122){
$proxy = "202.29.97.2:3128";
}
if($rand == 123){
$proxy = "221.176.14.72:80";
}
if($rand == 124){
$proxy = "124.202.200.204:9000";
}
if($rand == 125){
$proxy = "213.24.60.52:8080";
}
if($rand == 126){
$proxy = "36.250.69.4:80";
}
if($rand == 127){
$proxy = "1.179.147.2:8080";
}
if($rand == 128){
$proxy = "196.41.60.230:8080";
}
if($rand == 129){
$proxy = "119.97.164.48:8085";
}
if($rand == 130){
$proxy = "218.90.174.167:3128";
}
if($rand == 131){
$proxy = "177.99.176.146:8080";
}
if($rand == 132){
$proxy = "111.13.12.216:80";
}
if($rand == 133){
$proxy = "120.85.132.234:80";
}
if($rand == 134){
$proxy = "201.232.104.7:8080";
}
if($rand == 135){
$proxy = "58.253.238.242:80";
}
if($rand == 136){
$proxy = "137.135.166.225:8118";
}
if($rand == 137){
$proxy = "115.231.96.120:80";
}
if($rand == 138){
$proxy = "58.214.5.229:80";
}
if($rand == 139){
$proxy = "121.14.9.76:80";
}
if($rand == 140){
$proxy = "106.37.177.251:3128";
}
if($rand == 141){
$proxy = "58.253.238.243:80";
}
if($rand == 142){
$proxy = "177.36.6.72:3130";
}
if($rand == 143){
$proxy = "223.68.6.10:8000";
}
if($rand == 144){
$proxy = "121.14.138.56:81";
}
if($rand == 145){
$proxy = "216.12.231.75:3129";
}
if($rand == 146){
$proxy = "177.23.90.1:8181";
}
if($rand == 147){
$proxy = "122.96.59.106:843";
}
if($rand == 148){
$proxy = "200.192.254.197:8080";
}
if($rand == 149){
$proxy = "183.203.8.148:8080";
}
if($rand == 150){
$proxy = "218.4.236.117:80";
}
if($rand == 151){
$proxy = "202.108.23.247:80";
}
if($rand == 152){
$proxy = "189.85.17.26:8080";
}
if($rand == 153){
$proxy = "122.96.59.106:81";
}
if($rand == 154){
$proxy = "203.192.12.146:80";
}
if($rand == 155){
$proxy = "176.106.127.253:8080";
}
if($rand == 156){
$proxy = "220.181.32.106:80";
}
if($rand == 157){
$proxy = "122.225.106.36:80";
}
if($rand == 158){
$proxy = "122.96.59.106:83";
}
if($rand == 159){
$proxy = "211.77.5.41:8081";
}
if($rand == 160){
$proxy = "186.167.65.27:8080";
}
if($rand == 161){
$proxy = "101.71.27.120:80";
}
if($rand == 162){
$proxy = "186.167.65.26:8080";
}
if($rand == 163){
$proxy = "196.3.177.82:8080";
}
if($rand == 164){
$proxy = "122.96.59.106:82";
}
if($rand == 165){
$proxy = "196.3.177.85:8080";
}
if($rand == 166){
$proxy = "185.6.55.52:8080";
}
if($rand == 167){
$proxy = "181.143.9.91:8080";
}
if($rand == 168){
$proxy = "122.154.151.130:8080";
}
if($rand == 169){
$proxy = "196.3.177.81:8080";
}
if($rand == 170){
$proxy = "121.14.9.76:110";
}
if($rand == 171){
$proxy = "200.192.248.74:8080";
}
if($rand == 172){
$proxy = "200.150.97.27:8080";
}
if($rand == 173){
$proxy = "41.161.72.75:8080";
}
if($rand == 174){
$proxy = "190.121.232.75:8080";
}
if($rand == 175){
$proxy = "217.21.146.209:8080";
}
if($rand == 176){
$proxy = "91.238.29.192:9999";
}
if($rand == 177){
$proxy = "61.19.86.244:808";
}
if($rand == 178){
$proxy = "88.159.96.236:80";
}
if($rand == 179){
$proxy = "136.0.16.217:8089";
}
if($rand == 180){
$proxy = "118.97.201.92:8080";
}
if($rand == 181){
$proxy = "210.211.18.140:808";
}
if($rand == 182){
$proxy = "125.209.91.190:8080";
}
if($rand == 183){
$proxy = "125.209.108.82:8080";
}
if($rand == 184){
$proxy = "187.115.148.141:3128";
}
if($rand == 185){
$proxy = "200.24.198.242:8080";
}
if($rand == 186){
$proxy = "177.124.175.222:3130";
}
if($rand == 187){
$proxy = "186.103.169.162:8080";
}
if($rand == 188){
$proxy = "186.250.96.77:8080";
}
if($rand == 189){
$proxy = "94.154.222.95:8080";
}
if($rand == 190){
$proxy = "177.87.241.226:8080";
}
if($rand == 191){
$proxy = "187.23.238.170:3128";
}
if($rand == 192){
$proxy = "212.98.159.194:8080";
}
if($rand == 193){
$proxy = "177.39.186.59:8008";
}
if($rand == 194){
$proxy = "203.172.243.114:8080";
}
if($rand == 195){
$proxy = "93.158.193.75:80";
}
if($rand == 196){
$proxy = "49.156.47.30:8080";
}
if($rand == 197){
$proxy = "212.200.111.198:8080";
}
if($rand == 198){
$proxy = "159.255.163.218:8080";
}
if($rand == 199){
$proxy = "112.90.146.76:3128";
}
if($rand == 200){
$proxy = "112.95.244.57:80";
}
if($rand == 201){
$proxy = "219.146.2.105:23";
}
if($rand == 202){
$proxy = "58.180.45.119:3128";
}
if($rand == 203){
$proxy = "114.57.31.210:8080";
}
if($rand == 204){
$proxy = "165.139.149.169:3128";
}
if($rand == 205){
$proxy = "183.111.169.209:3128";
}
if($rand == 206){
$proxy = "183.111.169.201:3128";
}
if($rand == 207){
$proxy = "41.72.201.78:3128";
}
if($rand == 208){
$proxy = "5.53.16.183:8080";
}
if($rand == 209){
$proxy = "93.61.114.253:8080";
}
if($rand == 210){
$proxy = "115.182.83.38:8080";
}
if($rand == 211){
$proxy = "81.29.251.177:8080";
}
if($rand == 212){
$proxy = "89.249.207.65:3128";
}
if($rand == 213){
$proxy = "62.201.200.7:80";
}
if($rand == 214){
$proxy = "177.87.241.94:8080";
}
if($rand == 215){
$proxy = "193.178.187.187:9999";
}
if($rand == 216){
$proxy = "1.186.34.51:8080";
}
if($rand == 217){
$proxy = "199.193.247.211:10000";
}
if($rand == 218){
$proxy = "139.255.36.98:8080";
}
if($rand == 219){
$proxy = "177.135.226.181:80";
}
if($rand == 220){
$proxy = "177.136.113.38:8080";
}
if($rand == 221){
$proxy = "217.75.222.254:3128";
}
if($rand == 222){
$proxy = "181.143.238.122:8080";
}
if($rand == 223){
$proxy = "118.97.239.146:8080";
}
if($rand == 224){
$proxy = "190.113.162.142:8080";
}
if($rand == 225){
$proxy = "187.49.81.20:6006";
}
if($rand == 226){
$proxy = "201.57.249.2:8080";
}
if($rand == 227){
$proxy = "188.237.149.78:8080";
}
if($rand == 228){
$proxy = "77.245.110.213:8080";
}
if($rand == 229){
$proxy = "183.111.169.202:3128";
}
if($rand == 230){
$proxy = "43.242.241.211:8080";
}
if($rand == 231){
$proxy = "93.63.138.176:8080";
}
if($rand == 232){
$proxy = "186.103.169.164:8080";
}
if($rand == 233){
$proxy = "92.222.14.156:8080";
}
if($rand == 234){
$proxy = "62.176.13.22:8088";
}
if($rand == 235){
$proxy = "195.175.201.170:8080";
}
if($rand == 236){
$proxy = "210.4.72.138:8080";
}
if($rand == 237){
$proxy = "201.116.227.169:3128";
}
if($rand == 238){
$proxy = "201.116.227.173:3128";
}
if($rand == 239){
$proxy = "202.130.104.236:8080";
}
if($rand == 240){
$proxy = "58.96.177.61:3128";
}
if($rand == 241){
$proxy = "149.255.255.250:80";
}
if($rand == 242){
$proxy = "177.189.240.163:3128";
}
if($rand == 243){
$proxy = "79.110.39.181:8080";
}
if($rand == 244){
$proxy = "90.155.154.76:8080";
}
if($rand == 245){
$proxy = "93.158.193.75:3128";
}
if($rand == 246){
$proxy = "186.103.169.166:8080";
}
if($rand == 247){
$proxy = "177.99.173.26:3128";
}
if($rand == 248){
$proxy = "80.112.184.247:80";
}
if($rand == 249){
$proxy = "201.20.182.10:8080";
}
if($rand == 250){
$proxy = "201.116.227.172:3128";
}
if($rand == 251){
$proxy = "190.186.42.124:8080";
}
if($rand == 252){
$proxy = "78.83.201.101:8081";
}
if($rand == 253){
$proxy = "190.189.90.91:8080";
}
if($rand == 254){
$proxy = "61.19.51.50:8080";
}
if($rand == 255){
$proxy = "163.53.186.51:8080";
}
if($rand == 256){
$proxy = "200.127.164.195:3128";
}
if($rand == 257){
$proxy = "201.116.227.171:3128";
}
if($rand == 258){
$proxy = "114.6.34.194:8080";
}
if($rand == 259){
$proxy = "93.51.247.104:80";
}
if($rand == 260){
$proxy = "151.80.197.192:80";
}
if($rand == 261){
$proxy = "82.139.70.104:80";
}
if($rand == 262){
$proxy = "195.138.91.242:3128";
}
if($rand == 263){
$proxy = "178.32.63.223:3128";
}
if($rand == 264){
$proxy = "180.214.246.97:8080";
}
if($rand == 265){
$proxy = "212.91.188.166:3128";
}
if($rand == 266){
$proxy = "27.131.14.194:8080";
}
if($rand == 267){
$proxy = "94.100.63.2:8080";
}
if($rand == 268){
$proxy = "37.98.224.153:8080";
}
if($rand == 269){
$proxy = "63.221.140.143:80";
}
if($rand == 270){
$proxy = "27.131.173.2:8080";
}
if($rand == 271){
$proxy = "190.7.21.156:3128";
}
if($rand == 272){
$proxy = "186.0.222.10:8080";
}
if($rand == 273){
$proxy = "78.28.49.210:8080";
}
if($rand == 274){
$proxy = "95.158.139.48:8080";
}
if($rand == 275){
$proxy = "190.181.27.177:3129";
}
if($rand == 276){
$proxy = "80.188.79.138:8080";
}
if($rand == 277){
$proxy = "199.255.95.37:8080";
}
if($rand == 278){
$proxy = "190.85.155.172:8080";
}
if($rand == 279){
$proxy = "181.112.40.22:8080";
}
if($rand == 280){
$proxy = "190.144.241.197:3128";
}
if($rand == 281){
$proxy = "64.26.152.44:80";
}
if($rand == 282){
$proxy = "177.87.76.1:8081";
}
if($rand == 283){
$proxy = "87.106.162.134:80";
}
if($rand == 284){
$proxy = "177.103.229.121:8080";
}
if($rand == 285){
$proxy = "37.239.46.10:80";
}
if($rand == 286){
$proxy = "177.85.59.23:3128";
}
if($rand == 287){
$proxy = "200.192.214.133:8080";
}
if($rand == 288){
$proxy = "177.72.96.89:8000";
}
if($rand == 289){
$proxy = "202.159.6.98:8080";
}
if($rand == 290){
$proxy = "186.121.212.90:80";
}
if($rand == 291){
$proxy = "195.128.51.66:3129";
}
if($rand == 292){
$proxy = "200.27.79.74:8080";
}
if($rand == 293){
$proxy = "190.121.138.162:80";
}
if($rand == 294){
$proxy = "118.97.32.226:8080";
}
if($rand == 295){
$proxy = "222.124.149.178:3128";
}
if($rand == 296){
$proxy = "206.181.83.254:8080";
}
if($rand == 297){
$proxy = "200.41.226.60:3129";
}
if($rand == 298){
$proxy = "121.101.185.138:8080";
}
if($rand == 299){
$proxy = "187.62.205.74:3128";
}
if($rand == 300){
$proxy = "37.187.253.39:8123";
}
if($rand == 301){
$proxy = "61.19.30.198:8080";
}
if($rand == 302){
$proxy = "187.45.112.5:3128";
}
if($rand == 303){
$proxy = "187.157.180.254:8080";
}
if($rand == 304){
$proxy = "190.248.135.134:8080";
}
if($rand == 305){
$proxy = "217.175.34.170:8080";
}
if($rand == 306){
$proxy = "83.221.208.217:8080";
}
if($rand == 307){
$proxy = "195.46.211.63:80";
}
if($rand == 308){
$proxy = "200.68.9.92:8080";
}
if($rand == 309){
$proxy = "177.185.62.254:8080";
}
if($rand == 310){
$proxy = "176.31.239.33:8123";
}
if($rand == 311){
$proxy = "186.67.193.194:8081";
}
if($rand == 312){
$proxy = "141.101.225.56:3128";
}
if($rand == 313){
$proxy = "182.253.206.58:3128";
}
if($rand == 314){
$proxy = "186.211.65.59:80";
}
if($rand == 315){
$proxy = "41.60.130.36:8080";
}
if($rand == 316){
$proxy = "187.44.1.54:8080";
}
if($rand == 317){
$proxy = "203.202.243.112:8080";
}
if($rand == 318){
$proxy = "183.111.169.204:3128";
}
if($rand == 319){
$proxy = "80.232.216.127:8585";
}
if($rand == 320){
$proxy = "125.253.32.158:3128";
}
if($rand == 321){
$proxy = "202.79.36.119:8080";
}
if($rand == 322){
$proxy = "27.106.33.161:8080";
}
if($rand == 323){
$proxy = "207.5.112.114:8080";
}
if($rand == 324){
$proxy = "177.128.193.109:8089";
}
if($rand == 325){
$proxy = "177.136.175.238:8080";
}
if($rand == 326){
$proxy = "62.241.149.172:8080";
}
if($rand == 327){
$proxy = "80.91.88.36:8080";
}
if($rand == 328){
$proxy = "94.136.95.150:8080";
}
if($rand == 329){
$proxy = "204.14.188.53:7004";
}
if($rand == 330){
$proxy = "203.114.109.66:3128";
}
if($rand == 331){
$proxy = "182.16.7.86:3128";
}
if($rand == 332){
$proxy = "182.16.7.83:3128";
}
if($rand == 333){
$proxy = "27.131.47.132:8080";
}
if($rand == 334){
$proxy = "201.132.118.115:8080";
}
if($rand == 335){
$proxy = "182.16.7.82:3128";
}
if($rand == 336){
$proxy = "200.167.191.227:3128";
}
if($rand == 337){
$proxy = "202.57.10.138:8080";
}
if($rand == 338){
$proxy = "93.183.155.39:8080";
}
if($rand == 339){
$proxy = "116.68.199.110:8080";
}
if($rand == 340){
$proxy = "177.21.227.126:8080";
}
if($rand == 341){
$proxy = "181.15.200.108:3129";
}
if($rand == 342){
$proxy = "110.172.146.4:8080";
}
if($rand == 343){
$proxy = "60.254.32.1:8080";
}
if($rand == 344){
$proxy = "177.21.227.129:8080";
}
if($rand == 345){
$proxy = "182.156.90.58:8080";
}
if($rand == 346){
$proxy = "189.124.17.134:3128";
}
if($rand == 347){
$proxy = "189.85.29.98:8080";
}
if($rand == 348){
$proxy = "83.211.230.44:3128";
}
if($rand == 349){
$proxy = "203.130.192.179:80";
}
if($rand == 350){
$proxy = "119.82.253.197:8080";
}
if($rand == 351){
$proxy = "212.56.208.154:8080";
}
if($rand == 352){
$proxy = "41.73.20.74:8080";
}
if($rand == 353){
$proxy = "217.170.23.52:3128";
}
if($rand == 354){
$proxy = "200.37.12.137:8080";
}
if($rand == 355){
$proxy = "59.58.162.141:888";
}
if($rand == 356){
$proxy = "190.37.140.150:3128";
}
if($rand == 357){
$proxy = "89.26.71.134:8080";
}
if($rand == 358){
$proxy = "80.188.135.11:8080";
}
if($rand == 359){
$proxy = "202.59.160.10:8080";
}
if($rand == 360){
$proxy = "88.82.172.237:7777";
}
if($rand == 361){
$proxy = "193.179.1.114:8080";
}
if($rand == 362){
$proxy = "190.121.138.162:8080";
}
if($rand == 363){
$proxy = "85.185.42.5:8080";
}
if($rand == 364){
$proxy = "177.39.186.61:3128";
}
if($rand == 365){
$proxy = "95.0.124.58:8080";
}
if($rand == 366){
$proxy = "197.253.6.69:8080";
}
if($rand == 367){
$proxy = "187.8.128.53:8080";
}
if($rand == 368){
$proxy = "213.135.234.6:81";
}
if($rand == 369){
$proxy = "118.69.226.241:8888";
}
if($rand == 370){
$proxy = "177.69.52.192:3128";
}
if($rand == 371){
$proxy = "41.160.223.252:8080";
}
if($rand == 372){
$proxy = "82.139.88.56:80";
}
if($rand == 373){
$proxy = "190.15.192.120:3128";
}
if($rand == 374){
$proxy = "77.55.245.38:3128";
}
if($rand == 375){
$proxy = "177.184.137.166:8080";
}
if($rand == 376){
$proxy = "196.201.231.110:8080";
}
if($rand == 377){
$proxy = "64.62.250.38:80";
}
if($rand == 378){
$proxy = "85.15.176.223:8080";
}
if($rand == 379){
$proxy = "81.29.251.182:8080";
}
if($rand == 380){
$proxy = "193.193.246.42:3130";
}
if($rand == 381){
$proxy = "88.159.140.239:80";
}
if($rand == 382){
$proxy = "94.181.34.64:8080";
}
if($rand == 383){
$proxy = "88.135.140.117:8080";
}
if($rand == 384){
$proxy = "36.77.126.4:8080";
}
if($rand == 385){
$proxy = "190.128.238.38:8080";
}
if($rand == 386){
$proxy = "202.142.170.70:8080";
}
if($rand == 387){
$proxy = "197.218.204.202:80";
}
if($rand == 388){
$proxy = "109.197.92.60:8080";
}
if($rand == 389){
$proxy = "188.129.255.226:3128";
}
if($rand == 390){
$proxy = "123.125.104.240:80";
}
if($rand == 391){
$proxy = "202.119.25.73:9999";
}
if($rand == 392){
$proxy = "187.49.81.16:6006";
}
if($rand == 393){
$proxy = "200.87.179.178:8080";
}
if($rand == 394){
$proxy = "122.225.106.35:80";
}
if($rand == 395){
$proxy = "177.128.193.37:8089";
}
if($rand == 396){
$proxy = "200.192.253.151:8080";
}
if($rand == 397){
$proxy = "37.216.235.242:8080";
}
if($rand == 398){
$proxy = "99.185.0.108:3128";
}
if($rand == 399){
$proxy = "119.148.9.130:8080";
}
if($rand == 400){
$proxy = "77.174.184.148:80";
}
if($rand == 401){
$proxy = "137.135.166.225:8120";
}
if($rand == 402){
$proxy = "203.130.192.179:3128";
}
if($rand == 403){
$proxy = "111.90.188.146:8080";
}
if($rand == 404){
$proxy = "220.157.107.14:8080";
}
if($rand == 405){
$proxy = "176.194.189.56:8080";
}
if($rand == 406){
$proxy = "190.214.48.125:8080";
}
if($rand == 407){
$proxy = "177.200.82.236:8080";
}
if($rand == 408){
$proxy = "37.157.188.58:8080";
}
if($rand == 409){
$proxy = "31.217.218.36:8080";
}
if($rand == 410){
$proxy = "223.197.56.102:80";
}
if($rand == 411){
$proxy = "118.69.205.202:4624";
}
if($rand == 412){
$proxy = "211.77.5.38:3128";
}
if($rand == 413){
$proxy = "115.124.75.150:80";
}
if($rand == 414){
$proxy = "202.179.184.66:8080";
}
if($rand == 415){
$proxy = "65.18.103.253:3128";
}
if($rand == 416){
$proxy = "198.99.224.134:80";
}
if($rand == 417){
$proxy = "110.232.76.150:18080";
}
if($rand == 418){
$proxy = "196.45.159.89:8080";
}
if($rand == 419){
$proxy = "211.77.5.38:8081";
}
if($rand == 420){
$proxy = "202.162.214.116:3128";
}
if($rand == 421){
$proxy = "190.85.130.18:3128";
}
if($rand == 422){
$proxy = "200.43.219.118:8080";
}
if($rand == 423){
$proxy = "41.87.81.138:8080";
}
if($rand == 424){
$proxy = "91.217.42.2:8080";
}
if($rand == 425){
$proxy = "91.217.42.4:8080";
}
if($rand == 426){
$proxy = "178.189.92.118:3129";
}
if($rand == 427){
$proxy = "91.217.42.3:8080";
}
if($rand == 428){
$proxy = "180.250.174.250:8080";
}
if($rand == 429){
$proxy = "110.5.110.118:80";
}
if($rand == 430){
$proxy = "201.210.10.233:8090";
}
if($rand == 431){
$proxy = "92.222.237.96:8888";
}
if($rand == 432){
$proxy = "203.172.214.142:8080";
}
if($rand == 433){
$proxy = "177.125.145.30:8080";
}
if($rand == 434){
$proxy = "212.175.244.43:8080";
}
if($rand == 435){
$proxy = "183.136.135.153:8080";
}
if($rand == 436){
$proxy = "183.207.228.44:80";
}
if($rand == 437){
$proxy = "222.45.196.46:8118";
}
if($rand == 438){
$proxy = "59.61.79.124:8118";
}
if($rand == 439){
$proxy = "211.77.5.41:80";
}
if($rand == 440){
$proxy = "177.43.212.44:3128";
}
if($rand == 441){
$proxy = "80.167.238.77:1080";
}
if($rand == 442){
$proxy = "61.157.126.37:18000";
}
if($rand == 443){
$proxy = "196.11.90.57:8080";
}
if($rand == 444){
$proxy = "200.93.201.221:8081";
}
if($rand == 445){
$proxy = "115.31.160.3:8080";
}
if($rand == 446){
$proxy = "217.113.120.22:8080";
}
if($rand == 447){
$proxy = "110.49.210.113:80";
}
if($rand == 448){
$proxy = "82.151.117.162:8080";
}
if($rand == 449){
$proxy = "176.106.120.82:8080";
}
if($rand == 450){
$proxy = "195.62.223.78:8080";
}
if($rand == 451){
$proxy = "182.16.7.85:3128";
}
if($rand == 452){
$proxy = "41.78.88.181:8080";
}
if($rand == 453){
$proxy = "118.97.170.78:8080";
}
if($rand == 454){
$proxy = "119.18.153.246:8080";
}
if($rand == 455){
$proxy = "195.40.6.43:8080";
}
if($rand == 456){
$proxy = "176.110.163.230:3128";
}
if($rand == 457){
$proxy = "119.105.177.105:8118";
}
if($rand == 458){
$proxy = "110.172.146.65:8080";
}
if($rand == 459){
$proxy = "187.188.195.66:8080";
}
if($rand == 460){
$proxy = "37.187.97.36:3128";
}
if($rand == 461){
$proxy = "31.25.141.148:8080";
}
if($rand == 462){
$proxy = "177.185.60.254:8080";
}
if($rand == 463){
$proxy = "189.201.242.27:8080";
}
if($rand == 464){
$proxy = "202.77.119.115:3128";
}
if($rand == 465){
$proxy = "89.32.239.118:8080";
}
if($rand == 466){
$proxy = "201.132.118.114:8080";
}
if($rand == 467){
$proxy = "202.164.38.11:8080";
}
if($rand == 468){
$proxy = "180.250.163.34:8888";
}
if($rand == 469){
$proxy = "110.49.210.113:8080";
}
if($rand == 470){
$proxy = "177.55.253.68:8080";
}
if($rand == 471){
$proxy = "125.209.88.46:8080";
}
if($rand == 472){
$proxy = "200.49.4.101:8080";
}
if($rand == 473){
$proxy = "139.255.40.130:8080";
}
if($rand == 474){
$proxy = "82.114.82.58:8080";
}
if($rand == 475){
$proxy = "24.205.244.90:7004";
}
if($rand == 476){
$proxy = "119.147.86.212:9090";
}
if($rand == 477){
$proxy = "78.36.202.149:3128";
}
if($rand == 478){
$proxy = "78.36.202.149:3129";
}
if($rand == 479){
$proxy = "187.254.216.157:8080";
}
if($rand == 480){
$proxy = "108.166.220.19:8080";
}
if($rand == 481){
$proxy = "94.231.116.134:8080";
}
if($rand == 482){
$proxy = "84.22.35.37:3129";
}
if($rand == 483){
$proxy = "180.250.149.73:8080";
}
if($rand == 484){
$proxy = "206.181.83.254:80";
}
if($rand == 485){
$proxy = "84.47.113.7:8080";
}
if($rand == 486){
$proxy = "196.45.159.173:8080";
}
if($rand == 487){
$proxy = "109.224.1.210:8080";
}
if($rand == 488){
$proxy = "116.197.135.82:8080";
}
if($rand == 489){
$proxy = "166.70.51.198:8080";
}
if($rand == 490){
$proxy = "183.87.118.14:8080";
}
if($rand == 491){
$proxy = "183.87.53.181:8080";
}
if($rand == 492){
$proxy = "200.192.254.196:8080";
}
if($rand == 493){
$proxy = "177.185.61.254:8080";
}
if($rand == 494){
$proxy = "218.29.111.106:9999";
}
if($rand == 495){
$proxy = "5.2.225.110:3128";
}
if($rand == 496){
$proxy = "5.56.12.13:8080";
}
if($rand == 497){
$proxy = "59.90.91.95:8080";
}
if($rand == 498){
$proxy = "177.72.96.81:8000";
}
if($rand == 499){
$proxy = "115.117.45.8:8080";
}
if($rand == 500){
$proxy = "125.99.120.186:8080";
}
if($rand == 501){
$proxy = "180.151.40.175:80";
}
if($rand == 502){
$proxy = "88.255.148.24:8080";
}
if($rand == 503){
$proxy = "201.116.227.170:3128";
}
if($rand == 504){
$proxy = "119.252.174.210:8080";
}
if($rand == 505){
$proxy = "203.160.59.121:8080";
}
if($rand == 506){
$proxy = "186.209.75.33:3128";
}
if($rand == 507){
$proxy = "197.218.204.202:8080";
}
if($rand == 508){
$proxy = "204.228.129.46:8080";
}
if($rand == 509){
$proxy = "180.234.213.93:8080";
}
if($rand == 510){
$proxy = "202.74.243.21:8080";
}
if($rand == 511){
$proxy = "177.55.255.250:8080";
}
if($rand == 512){
$proxy = "83.241.46.175:8080";
}
if($rand == 513){
$proxy = "177.55.254.196:8080";
}
if($rand == 514){
$proxy = "89.179.33.161:8080";
}
if($rand == 515){
$proxy = "186.209.74.112:3128";
}
if($rand == 516){
$proxy = "195.178.33.86:8080";
}
if($rand == 517){
$proxy = "115.239.210.199:80";
}
if($rand == 518){
$proxy = "75.102.129.2:8080";
}
if($rand == 519){
$proxy = "196.45.159.149:8080";
}
if($rand == 520){
$proxy = "75.102.129.65:8080";
}
if($rand == 521){
$proxy = "206.123.214.4:443";
}
if($rand == 522){
$proxy = "41.161.86.43:3128";
}
if($rand == 523){
$proxy = "200.68.9.90:8080";
}
if($rand == 524){
$proxy = "196.3.177.83:8080";
}
if($rand == 525){
$proxy = "196.3.177.78:8080";
}
if($rand == 526){
$proxy = "41.79.37.74:8585";
}
if($rand == 527){
$proxy = "222.88.242.213:9999";
}
if($rand == 528){
$proxy = "109.196.210.110:8080";
}
if($rand == 529){
$proxy = "95.215.52.150:8080";
}
if($rand == 530){
$proxy = "189.85.20.14:8080";
}
if($rand == 531){
$proxy = "87.76.12.174:8080";
}
if($rand == 532){
$proxy = "220.130.217.6:8000";
}
if($rand == 533){
$proxy = "113.23.190.234:8085";
}
if($rand == 534){
$proxy = "193.25.120.235:8080";
}
if($rand == 535){
$proxy = "211.139.80.180:8080";
}
if($rand == 536){
$proxy = "202.51.102.34:8080";
}
if($rand == 537){
$proxy = "5.56.12.1:8080";
}
if($rand == 538){
$proxy = "5.56.12.9:8080";
}
if($rand == 539){
$proxy = "84.22.35.34:3129";
}
if($rand == 540){
$proxy = "124.12.87.119:8088";
}
if($rand == 541){
$proxy = "212.185.87.53:443";
}
if($rand == 542){
$proxy = "85.113.254.115:80";
}
if($rand == 543){
$proxy = "178.19.247.73:8080";
}
if($rand == 544){
$proxy = "202.129.29.130:8080";
}
if($rand == 545){
$proxy = "67.45.172.205:87";
}
if($rand == 546){
$proxy = "119.254.88.53:8080";
}
if($rand == 547){
$proxy = "194.213.60.227:8585";
}
if($rand == 548){
$proxy = "36.81.3.192:8888";
}
if($rand == 549){
$proxy = "46.219.93.213:8080";
}
if($rand == 550){
$proxy = "5.152.233.1:8080";
}
if($rand == 551){
$proxy = "193.37.152.186:3128";
}
if($rand == 552){
$proxy = "177.128.192.145:8089";
}
if($rand == 553){
$proxy = "91.121.153.214:3128";
}
if($rand == 554){
$proxy = "82.209.49.194:8080";
}
if($rand == 555){
$proxy = "93.99.212.44:8080";
}
if($rand == 556){
$proxy = "60.169.78.218:808";
}
if($rand == 557){
$proxy = "58.147.174.113:8080";
}
if($rand == 558){
$proxy = "186.46.129.115:3128";
}
if($rand == 559){
$proxy = "178.151.149.227:80";
}
if($rand == 560){
$proxy = "223.27.80.194:8080";
}
if($rand == 561){
$proxy = "177.55.254.49:8080";
}
if($rand == 562){
$proxy = "88.225.232.158:8080";
}
if($rand == 563){
$proxy = "178.124.180.246:8080";
}
if($rand == 564){
$proxy = "82.114.82.60:8080";
}
if($rand == 565){
$proxy = "203.114.110.83:8080";
}
if($rand == 566){
$proxy = "1.179.190.125:8080";
}
if($rand == 567){
$proxy = "195.5.109.243:8080";
}
if($rand == 568){
$proxy = "58.97.43.131:8080";
}
if($rand == 569){
$proxy = "201.249.201.105:8089";
}
if($rand == 570){
$proxy = "177.75.236.9:8080";
}
if($rand == 571){
$proxy = "218.92.227.165:33987";
}
if($rand == 572){
$proxy = "200.223.97.194:8080";
}
if($rand == 573){
$proxy = "201.216.229.49:8080";
}
if($rand == 574){
$proxy = "69.7.113.5:3128";
}
if($rand == 575){
$proxy = "38.98.148.57:8080";
}
if($rand == 576){
$proxy = "190.116.28.26:80";
}
if($rand == 577){
$proxy = "177.223.8.1:8080";
}
if($rand == 578){
$proxy = "190.202.164.9:8085";
}
if($rand == 579){
$proxy = "203.172.242.190:8080";
}
if($rand == 580){
$proxy = "137.135.166.225:8121";
}
if($rand == 581){
$proxy = "173.216.250.31:8080";
}
if($rand == 582){
$proxy = "201.62.59.1:8080";
}
if($rand == 583){
$proxy = "46.105.152.91:8888";
}
if($rand == 584){
$proxy = "31.220.43.28:80";
}
if($rand == 585){
$proxy = "118.97.189.34:8080";
}
if($rand == 586){
$proxy = "177.184.135.154:8080";
}
if($rand == 587){
$proxy = "37.200.99.210:8118";
}
if($rand == 588){
$proxy = "46.105.152.100:8888";
}
if($rand == 589){
$proxy = "94.139.204.185:8080";
}
if($rand == 590){
$proxy = "186.250.98.1:8080";
}
if($rand == 591){
$proxy = "94.76.179.1:8080";
}
if($rand == 592){
$proxy = "31.131.67.76:8080";
}
if($rand == 593){
$proxy = "177.185.48.101:8080";
}
if($rand == 594){
$proxy = "60.250.81.97:80";
}
if($rand == 595){
$proxy = "61.19.82.138:8080";
}
if($rand == 596){
$proxy = "62.240.104.131:8080";
}
if($rand == 597){
$proxy = "164.115.226.153:8080";
}
if($rand == 598){
$proxy = "86.102.106.150:8080";
}
if($rand == 599){
$proxy = "183.87.129.242:8080";
}
if($rand == 600){
$proxy = "210.6.237.191:3128";
}
if($rand == 601){
$proxy = "177.128.192.105:8089";
}
if($rand == 602){
$proxy = "110.232.83.38:8080";
}
if($rand == 603){
$proxy = "183.196.128.231:8080";
}
if($rand == 604){
$proxy = "188.121.62.155:80";
}
if($rand == 605){
$proxy = "82.192.30.245:8080";
}
if($rand == 606){
$proxy = "82.192.30.238:8080";
}
if($rand == 607){
$proxy = "115.117.45.4:8080";
}
if($rand == 608){
$proxy = "82.192.30.250:8080";
}
if($rand == 609){
$proxy = "85.13.13.100:8080";
}
if($rand == 610){
$proxy = "85.13.13.254:8080";
}
if($rand == 611){
$proxy = "182.16.7.84:3128";
}
if($rand == 612){
$proxy = "163.53.186.218:8080";
}
if($rand == 613){
$proxy = "89.218.93.59:3130";
}
if($rand == 614){
$proxy = "125.99.100.73:8080";
}
if($rand == 615){
$proxy = "118.179.220.186:8080";
}
if($rand == 616){
$proxy = "84.47.113.8:8080";
}
if($rand == 617){
$proxy = "1.179.176.37:8080";
}
if($rand == 618){
$proxy = "109.224.56.210:8080";
}
if($rand == 619){
$proxy = "81.219.208.1:8080";
}
if($rand == 620){
$proxy = "180.250.212.242:8080";
}
if($rand == 621){
$proxy = "60.250.81.118:80";
}
if($rand == 622){
$proxy = "202.129.15.241:8080";
}
if($rand == 623){
$proxy = "89.22.132.32:8080";
}
if($rand == 624){
$proxy = "8.29.210.46:3128";
}
if($rand == 625){
$proxy = "87.239.168.145:8080";
}
if($rand == 626){
$proxy = "203.172.233.134:8080";
}
if($rand == 627){
$proxy = "82.114.88.208:80";
}
if($rand == 628){
$proxy = "82.114.88.208:8080";
}
if($rand == 629){
$proxy = "186.95.200.66:3128";
}
if($rand == 630){
$proxy = "201.249.202.166:8089";
}
if($rand == 631){
$proxy = "168.63.24.174:8123";
}
if($rand == 632){
$proxy = "112.78.47.130:888";
}
if($rand == 633){
$proxy = "210.61.240.160:8000";
}
if($rand == 634){
$proxy = "46.16.226.10:8080";
}
if($rand == 635){
$proxy = "213.144.132.109:80";
}
if($rand == 636){
$proxy = "189.113.89.186:8080";
}
if($rand == 637){
$proxy = "186.46.162.246:8080";
}
if($rand == 638){
$proxy = "110.164.199.18:3128";
}
if($rand == 639){
$proxy = "27.34.169.28:80";
}
if($rand == 640){
$proxy = "216.171.205.9:8080";
}
if($rand == 641){
$proxy = "213.81.212.137:8080";
}
if($rand == 642){
$proxy = "180.211.179.50:8080";
}
if($rand == 643){
$proxy = "89.32.230.38:8080";
}
if($rand == 644){
$proxy = "82.114.86.118:8080";
}
if($rand == 645){
$proxy = "201.55.143.1:3128";
}
if($rand == 646){
$proxy = "194.154.74.210:8080";
}
if($rand == 647){
$proxy = "201.72.98.244:8088";
}
if($rand == 648){
$proxy = "91.121.167.5:8118";
}
if($rand == 649){
$proxy = "46.19.231.190:8080";
}
if($rand == 650){
$proxy = "201.20.182.122:8080";
}
if($rand == 651){
$proxy = "200.195.135.195:3128";
}
if($rand == 652){
$proxy = "5.56.12.2:8080";
}
if($rand == 653){
$proxy = "186.103.149.50:8080";
}
if($rand == 654){
$proxy = "223.25.97.89:8080";
}
if($rand == 655){
$proxy = "123.30.75.115:443";
}
if($rand == 656){
$proxy = "211.144.76.58:9000";
}
if($rand == 657){
$proxy = "186.46.187.28:8080";
}
if($rand == 658){
$proxy = "177.75.42.33:8080";
}
if($rand == 659){
$proxy = "182.160.116.50:8080";
}
if($rand == 660){
$proxy = "109.196.127.35:8888";
}
if($rand == 661){
$proxy = "180.250.160.58:8080";
}
if($rand == 662){
$proxy = "202.78.206.70:8080";
}
if($rand == 663){
$proxy = "177.75.43.50:8080";
}
if($rand == 664){
$proxy = "195.244.36.177:8080";
}
if($rand == 665){
$proxy = "93.116.49.221:8080";
}
if($rand == 666){
$proxy = "93.116.49.221:80";
}
if($rand == 667){
$proxy = "203.160.56.116:8080";
}
if($rand == 668){
$proxy = "89.190.195.170:8080";
}
if($rand == 669){
$proxy = "41.220.28.138:8080";
}
if($rand == 670){
$proxy = "60.250.81.118:8080";
}
if($rand == 671){
$proxy = "202.59.163.129:8080";
}
if($rand == 672){
$proxy = "168.63.24.174:8118";
}
if($rand == 673){
$proxy = "190.0.33.18:3128";
}
if($rand == 674){
$proxy = "89.234.195.145:8000";
}
if($rand == 675){
$proxy = "91.196.230.66:3128";
}
if($rand == 676){
$proxy = "78.159.227.142:3128";
}
if($rand == 677){
$proxy = "83.172.144.19:80";
}
if($rand == 678){
$proxy = "186.250.96.66:8080";
}
if($rand == 679){
$proxy = "190.92.87.18:8080";
}
if($rand == 680){
$proxy = "118.97.130.10:80";
}
if($rand == 681){
$proxy = "180.247.19.96:8080";
}
if($rand == 682){
$proxy = "180.247.19.183:8080";
}
if($rand == 683){
$proxy = "118.97.130.10:8080";
}
if($rand == 684){
$proxy = "89.234.195.145:80";
}
if($rand == 685){
$proxy = "85.185.42.2:8080";
}
if($rand == 686){
$proxy = "201.208.38.168:3128";
}
if($rand == 687){
$proxy = "189.126.49.98:8080";
}
if($rand == 688){
$proxy = "190.102.17.180:80";
}
if($rand == 689){
$proxy = "89.234.199.181:8000";
}
if($rand == 690){
$proxy = "85.185.42.6:8080";
}
if($rand == 691){
$proxy = "85.185.42.3:8080";
}
if($rand == 692){
$proxy = "89.234.199.60:8000";
}
if($rand == 693){
$proxy = "80.253.28.174:8080";
}
if($rand == 694){
$proxy = "95.0.192.160:8080";
}
if($rand == 695){
$proxy = "207.182.147.86:3128";
}
if($rand == 696){
$proxy = "203.93.104.20:80";
}
if($rand == 697){
$proxy = "88.159.172.245:80";
}
if($rand == 698){
$proxy = "94.229.247.57:8080";
}
if($rand == 699){
$proxy = "148.251.234.73:80";
}
if($rand == 700){
$proxy = "190.200.249.29:8080";
}
if($rand == 701){
$proxy = "27.131.144.50:3128";
}
if($rand == 702){
$proxy = "177.128.193.49:8089";
}
if($rand == 703){
$proxy = "190.147.0.56:8080";
}
if($rand == 704){
$proxy = "202.78.206.83:8080";
}
if($rand == 705){
$proxy = "186.121.212.90:8080";
}
if($rand == 706){
$proxy = "125.209.73.57:8080";
}
if($rand == 707){
$proxy = "61.19.177.42:8080";
}
if($rand == 708){
$proxy = "221.176.14.72:80";
}
if($rand == 709){
$proxy = "134.249.139.239:8080";
}
if($rand == 710){
$proxy = "190.189.90.91:8080";
}
if($rand == 711){
$proxy = "222.124.149.179:3128";
}
if($rand == 712){
$proxy = "176.106.127.253:8080";
}
if($rand == 713){
$proxy = "27.106.33.161:8080";
}
if($rand == 714){
$proxy = "94.136.95.150:8080";
}
if($rand == 715){
$proxy = "91.183.124.41:80";
}
if($rand == 716){
$proxy = "14.139.172.170:3128";
}
if($rand == 717){
$proxy = "202.77.119.115:3128";
}
if($rand == 718){
$proxy = "109.196.210.110:8080";
}
if($rand == 719){
$proxy = "5.56.12.9:8080";
}
if($rand == 720){
$proxy = "93.116.49.221:8080";
}
if($rand == 721){
$proxy = "176.31.239.33:8118";
}
if($rand == 722){
$proxy = "201.132.118.114:8080";
}
if($rand == 723){
$proxy = "202.129.15.241:8080";
}
if($rand == 724){
$proxy = "189.124.17.134:3128";
}
if($rand == 725){
$proxy = "54.187.52.159:3128";
}
if($rand == 726){
$proxy = "195.40.6.43:3128";
}
if($rand == 727){
$proxy = "83.211.230.44:3128";
}
if($rand == 728){
$proxy = "200.43.65.91:8080";
}
if($rand == 729){
$proxy = "190.184.144.174:8080";
}
if($rand == 730){
$proxy = "60.250.81.118:80";
}
if($rand == 731){
$proxy = "112.95.244.57:80";
}
if($rand == 732){
$proxy = "187.188.195.66:8080";
}
if($rand == 733){
$proxy = "180.211.179.50:8080";
}
if($rand == 734){
$proxy = "124.6.135.170:3128";
}
if($rand == 735){
$proxy = "121.200.63.2:8080";
}
if($rand == 736){
$proxy = "182.160.116.50:8080";
}
if($rand == 737){
$proxy = "200.68.9.90:8080";
}
if($rand == 738){
$proxy = "137.135.166.225:8125";
}
if($rand == 739){
$proxy = "203.114.109.66:3128";
}
if($rand == 740){
$proxy = "173.192.79.55:80";
}
if($rand == 741){
$proxy = "123.30.75.115:80";
}
if($rand == 742){
$proxy = "213.85.92.10:80";
}
if($rand == 743){
$proxy = "211.139.80.180:8080";
}
if($rand == 744){
$proxy = "210.82.92.77:3128";
}
if($rand == 745){
$proxy = "41.72.105.38:3128";
}
if($rand == 746){
$proxy = "213.151.89.71:80";
}
if($rand == 747){
$proxy = "177.99.176.146:8080";
}
if($rand == 748){
$proxy = "163.177.79.4:80";
}
if($rand == 749){
$proxy = "218.90.174.167:3128";
}
if($rand == 750){
$proxy = "89.218.93.59:3130";
}
if($rand == 751){
$proxy = "222.88.242.213:9999";
}
if($rand == 752){
$proxy = "211.144.81.68:18000";
}
if($rand == 753){
$proxy = "111.13.12.216:80";
}
if($rand == 754){
$proxy = "221.231.135.149:80";
}
if($rand == 755){
$proxy = "24.205.244.90:7004";
}
if($rand == 756){
$proxy = "58.253.238.242:80";
}
if($rand == 757){
$proxy = "115.231.96.120:80";
}
if($rand == 758){
$proxy = "58.214.5.229:80";
}
if($rand == 759){
$proxy = "211.77.5.41:8081";
}
if($rand == 760){
$proxy = "106.37.177.251:3128";
}
if($rand == 761){
$proxy = "31.28.6.13:8118";
}
if($rand == 762){
$proxy = "58.253.238.243:80";
}
if($rand == 763){
$proxy = "163.177.79.5:80";
}
if($rand == 764){
$proxy = "223.68.6.10:8000";
}
if($rand == 765){
$proxy = "64.62.233.67:80";
}
if($rand == 766){
$proxy = "121.14.138.56:81";
}
if($rand == 767){
$proxy = "119.147.86.212:9090";
}
if($rand == 768){
$proxy = "202.106.16.36:3128";
}
if($rand == 769){
$proxy = "120.236.148.113:3128";
}
if($rand == 770){
$proxy = "183.203.8.148:8080";
}
if($rand == 771){
$proxy = "218.4.236.117:80";
}
if($rand == 772){
$proxy = "202.108.23.247:80";
}
if($rand == 773){
$proxy = "220.181.32.106:80";
}
if($rand == 774){
$proxy = "41.215.7.94:8080";
}
if($rand == 775){
$proxy = "41.220.28.138:8080";
}
if($rand == 776){
$proxy = "122.225.106.36:80";
}
if($rand == 777){
$proxy = "119.188.94.145:80";
}
if($rand == 778){
$proxy = "62.165.42.170:8080";
}
if($rand == 779){
$proxy = "36.250.69.4:80";
}
if($rand == 780){
$proxy = "75.126.26.180:80";
}
if($rand == 781){
$proxy = "101.71.27.120:80";
}
if($rand == 782){
$proxy = "168.63.24.174:8121";
}
if($rand == 783){
$proxy = "203.192.12.148:80";
}
if($rand == 784){
$proxy = "122.96.59.106:81";
}
if($rand == 785){
$proxy = "213.24.60.52:8080";
}
if($rand == 786){
$proxy = "200.150.97.27:8080";
}
if($rand == 787){
$proxy = "200.30.82.174:8080";
}
if($rand == 788){
$proxy = "89.190.195.170:8080";
}
if($rand == 789){
$proxy = "217.21.146.209:8080";
}
if($rand == 790){
$proxy = "177.75.70.1:8080";
}
if($rand == 791){
$proxy = "195.40.6.43:8080";
}
if($rand == 792){
$proxy = "210.101.131.231:8080";
}
if($rand == 793){
$proxy = "85.185.42.3:8080";
}
if($rand == 794){
$proxy = "85.185.42.2:8080";
}
if($rand == 795){
$proxy = "85.185.42.5:8080";
}
if($rand == 796){
$proxy = "210.101.131.232:8080";
}
if($rand == 797){
$proxy = "80.232.216.127:8585";
}
if($rand == 798){
$proxy = "31.15.48.12:80";
}
if($rand == 799){
$proxy = "89.191.131.243:8080";
}
if($rand == 800){
$proxy = "149.156.112.55:80";
}
if($rand == 801){
$proxy = "121.14.9.76:80";
}
if($rand == 802){
$proxy = "202.79.59.110:8080";
}
if($rand == 803){
$proxy = "109.224.1.210:8080";
}
if($rand == 804){
$proxy = "193.179.1.114:8080";
}
if($rand == 805){
$proxy = "27.131.144.50:3128";
}
if($rand == 806){
$proxy = "201.57.249.2:8080";
}
if($rand == 807){
$proxy = "69.7.113.4:3128";
}
if($rand == 808){
$proxy = "193.178.187.187:9999";
}
if($rand == 809){
$proxy = "200.223.233.219:3128";
}
if($rand == 810){
$proxy = "166.70.97.138:8080";
}
if($rand == 811){
$proxy = "187.44.1.54:8080";
}
if($rand == 812){
$proxy = "177.39.186.62:8008";
}
if($rand == 813){
$proxy = "89.249.207.65:3128";
}
if($rand == 814){
$proxy = "91.217.42.3:8080";
}
if($rand == 815){
$proxy = "194.154.74.210:8080";
}
if($rand == 816){
$proxy = "213.141.149.28:3128";
}
if($rand == 817){
$proxy = "36.85.91.95:8080";
}
if($rand == 818){
$proxy = "5.53.16.183:8080";
}
if($rand == 819){
$proxy = "88.159.140.239:80";
}
if($rand == 820){
$proxy = "187.45.112.5:3128";
}
if($rand == 821){
$proxy = "180.234.213.93:8080";
}
if($rand == 822){
$proxy = "50.62.134.171:80";
}
if($rand == 823){
$proxy = "91.238.29.192:9999";
}
if($rand == 824){
$proxy = "27.131.47.132:8080";
}
if($rand == 825){
$proxy = "183.111.169.202:3128";
}
if($rand == 826){
$proxy = "77.245.110.213:8080";
}
if($rand == 827){
$proxy = "201.116.227.171:3128";
}
if($rand == 828){
$proxy = "118.179.220.186:8080";
}
if($rand == 829){
$proxy = "149.255.255.250:80";
}
if($rand == 830){
$proxy = "116.90.208.131:8080";
}
if($rand == 831){
$proxy = "190.85.155.172:8080";
}
if($rand == 832){
$proxy = "27.131.14.194:8080";
}
if($rand == 833){
$proxy = "177.189.240.163:3128";
}
if($rand == 834){
$proxy = "212.91.188.166:3128";
}
if($rand == 835){
$proxy = "190.208.45.221:3128";
}
if($rand == 836){
$proxy = "190.215.48.228:3128";
}
if($rand == 837){
$proxy = "189.45.56.98:3128";
}
if($rand == 838){
$proxy = "177.36.6.72:3130";
}
if($rand == 839){
$proxy = "136.0.16.217:7808";
}
if($rand == 840){
$proxy = "201.116.227.170:3128";
}
if($rand == 841){
$proxy = "182.253.206.58:3128";
}
if($rand == 842){
$proxy = "222.124.176.18:8080";
}
if($rand == 843){
$proxy = "178.46.154.140:8080";
}
if($rand == 844){
$proxy = "64.26.152.44:80";
}
if($rand == 845){
$proxy = "117.102.122.218:8181";
}
if($rand == 846){
$proxy = "84.22.35.37:3129";
}
if($rand == 847){
$proxy = "198.99.224.134:80";
}
if($rand == 848){
$proxy = "201.116.227.172:3128";
}
if($rand == 849){
$proxy = "201.116.227.173:3128";
}
if($rand == 850){
$proxy = "183.111.169.201:3128";
}
if($rand == 851){
$proxy = "183.111.169.209:3128";
}
if($rand == 852){
$proxy = "183.111.169.206:3128";
}
if($rand == 853){
$proxy = "178.215.111.71:9999";
}
if($rand == 854){
$proxy = "114.6.34.194:8080";
}
if($rand == 855){
$proxy = "201.208.38.168:3128";
}
if($rand == 856){
$proxy = "186.95.200.66:3128";
}
if($rand == 857){
$proxy = "83.241.46.175:8080";
}
if($rand == 858){
$proxy = "173.216.250.31:8080";
}
if($rand == 859){
$proxy = "204.228.129.46:8080";
}
if($rand == 860){
$proxy = "211.77.5.38:3128";
}
if($rand == 861){
$proxy = "181.143.9.91:8080";
}
if($rand == 862){
$proxy = "211.77.5.38:8081";
}
if($rand == 863){
$proxy = "210.61.240.160:8000";
}
if($rand == 864){
$proxy = "217.113.120.22:8080";
}
if($rand == 865){
$proxy = "85.15.176.223:8080";
}
if($rand == 866){
$proxy = "218.28.196.98:8080";
}
if($rand == 867){
$proxy = "37.239.46.10:80";
}
if($rand == 868){
$proxy = "137.135.166.225:8123";
}
if($rand == 869){
$proxy = "200.27.79.74:8080";
}
if($rand == 870){
$proxy = "118.96.138.7:8080";
}
if($rand == 871){
$proxy = "112.213.109.244:80";
}
if($rand == 872){
$proxy = "87.106.162.134:80";
}
if($rand == 873){
$proxy = "61.19.86.244:808";
}
if($rand == 874){
$proxy = "112.78.47.130:888";
}
if($rand == 875){
$proxy = "203.160.59.121:8080";
}
if($rand == 876){
$proxy = "91.217.42.4:8080";
}
if($rand == 877){
$proxy = "200.41.226.60:3128";
}
if($rand == 878){
$proxy = "210.2.132.14:8080";
}
if($rand == 879){
$proxy = "125.209.108.82:8080";
}
if($rand == 880){
$proxy = "37.187.97.36:3128";
}
if($rand == 881){
$proxy = "213.135.234.6:81";
}
if($rand == 882){
$proxy = "202.62.85.186:8080";
}
if($rand == 883){
$proxy = "58.96.182.226:3128";
}
if($rand == 884){
$proxy = "5.56.12.13:8080";
}
if($rand == 885){
$proxy = "123.30.75.115:443";
}
if($rand == 886){
$proxy = "190.248.135.134:8080";
}
if($rand == 887){
$proxy = "180.247.19.183:8080";
}
if($rand == 888){
$proxy = "200.68.9.92:8080";
}
if($rand == 889){
$proxy = "61.19.30.198:8080";
}
if($rand == 890){
$proxy = "41.60.130.36:8080";
}
if($rand == 891){
$proxy = "94.229.247.57:8080";
}
if($rand == 892){
$proxy = "187.49.81.16:6006";
}
if($rand == 893){
$proxy = "94.231.116.134:8080";
}
if($rand == 894){
$proxy = "119.148.9.130:8080";
}
if($rand == 895){
$proxy = "112.90.146.76:3128";
}
if($rand == 896){
$proxy = "200.192.252.130:8080";
}
if($rand == 897){
$proxy = "123.30.75.115:3128";
}
if($rand == 898){
$proxy = "177.21.227.126:8080";
}
if($rand == 899){
$proxy = "177.21.227.129:8080";
}
if($rand == 900){
$proxy = "189.85.29.98:8080";
}
if($rand == 901){
$proxy = "177.21.227.133:8080";
}
if($rand == 902){
$proxy = "80.167.238.77:1080";
}
if($rand == 903){
$proxy = "210.4.72.138:8080";
}
if($rand == 904){
$proxy = "201.20.182.10:8080";
}
if($rand == 905){
$proxy = "89.26.71.134:8080";
}
if($rand == 906){
$proxy = "197.253.6.69:8080";
}
if($rand == 907){
$proxy = "94.247.25.162:80";
}
if($rand == 908){
$proxy = "216.12.231.77:3129";
}
if($rand == 909){
$proxy = "60.254.32.1:8080";
}
if($rand == 910){
$proxy = "183.111.169.208:3128";
}
if($rand == 911){
$proxy = "216.12.231.78:3129";
}
if($rand == 912){
$proxy = "41.161.86.43:3128";
}
if($rand == 913){
$proxy = "180.250.160.58:8080";
}
if($rand == 914){
$proxy = "77.50.220.92:8080";
}
if($rand == 915){
$proxy = "203.177.32.198:8000";
}
if($rand == 916){
$proxy = "181.15.200.108:3129";
}
if($rand == 917){
$proxy = "89.234.199.60:8000";
}
if($rand == 918){
$proxy = "190.151.10.226:8080";
}
if($rand == 919){
$proxy = "85.25.246.196:3128";
}
if($rand == 920){
$proxy = "1.179.146.153:8080";
}
if($rand == 921){
$proxy = "202.77.119.114:3128";
}
if($rand == 922){
$proxy = "194.8.47.6:8080";
}
if($rand == 923){
$proxy = "177.184.135.154:8080";
}
if($rand == 924){
$proxy = "211.144.76.58:9000";
}
if($rand == 925){
$proxy = "187.120.34.213:3128";
}
if($rand == 926){
$proxy = "88.82.172.237:7777";
}
if($rand == 927){
$proxy = "217.175.34.116:8080";
}
if($rand == 928){
$proxy = "200.24.198.242:8080";
}
if($rand == 929){
$proxy = "201.210.10.233:8090";
}
if($rand == 930){
$proxy = "177.47.230.1:8080";
}
if($rand == 931){
$proxy = "139.0.28.18:8080";
}
if($rand == 932){
$proxy = "180.245.229.82:8080";
}
if($rand == 933){
$proxy = "223.25.97.89:8080";
}
if($rand == 934){
$proxy = "223.25.97.82:8080";
}
if($rand == 935){
$proxy = "36.77.126.4:8080";
}
if($rand == 936){
$proxy = "212.185.87.53:443";
}
if($rand == 937){
$proxy = "193.25.120.235:8080";
}
if($rand == 938){
$proxy = "62.109.30.95:3128";
}
if($rand == 939){
$proxy = "211.77.5.41:80";
}
if($rand == 940){
$proxy = "211.144.81.69:18000";
}
if($rand == 941){
$proxy = "111.90.188.146:8080";
}
if($rand == 942){
$proxy = "137.135.166.225:8128";
}
if($rand == 943){
$proxy = "31.131.67.76:8080";
}
if($rand == 944){
$proxy = "195.5.109.243:8080";
}
if($rand == 945){
$proxy = "186.209.74.112:3128";
}
if($rand == 946){
$proxy = "115.31.160.3:8080";
}
if($rand == 947){
$proxy = "59.90.100.57:8080";
}
if($rand == 948){
$proxy = "110.49.210.113:80";
}
if($rand == 949){
$proxy = "183.87.53.181:8080";
}
if($rand == 950){
$proxy = "119.18.153.246:8080";
}
if($rand == 951){
$proxy = "120.197.57.244:8000";
}
if($rand == 952){
$proxy = "202.159.6.98:8080";
}
if($rand == 953){
$proxy = "218.29.111.106:9999";
}
if($rand == 954){
$proxy = "201.55.143.1:3128";
}
if($rand == 955){
$proxy = "177.72.96.81:8000";
}
if($rand == 956){
$proxy = "82.192.30.250:8080";
}
if($rand == 957){
$proxy = "183.111.169.204:3128";
}
if($rand == 958){
$proxy = "193.37.152.186:3128";
}
if($rand == 959){
$proxy = "81.219.208.1:8080";
}
if($rand == 960){
$proxy = "119.46.28.146:3129";
}
if($rand == 961){
$proxy = "93.116.49.221:80";
}
if($rand == 962){
$proxy = "89.32.239.118:8080";
}
if($rand == 963){
$proxy = "196.45.132.1:8080";
}
if($rand == 964){
$proxy = "196.45.159.145:8080";
}
if($rand == 965){
$proxy = "202.164.38.11:8080";
}
if($rand == 966){
$proxy = "5.56.12.1:8080";
}
if($rand == 967){
$proxy = "113.161.129.139:8080";
}
if($rand == 968){
$proxy = "1.179.198.37:8080";
}
if($rand == 969){
$proxy = "41.78.88.181:8080";
}
if($rand == 970){
$proxy = "137.135.166.225:8118";
}
if($rand == 971){
$proxy = "200.41.226.60:3129";
}
if($rand == 972){
$proxy = "122.96.59.106:80";
}
if($rand == 973){
$proxy = "122.96.59.106:82";
}
if($rand == 974){
$proxy = "122.96.59.106:843";
}
if($rand == 975){
$proxy = "183.196.128.231:8080";
}
if($rand == 976){
$proxy = "122.96.59.106:83";
}
if($rand == 977){
$proxy = "78.36.202.149:3128";
}
if($rand == 978){
$proxy = "5.11.143.173:8080";
}
if($rand == 979){
$proxy = "125.253.32.158:3128";
}
if($rand == 980){
$proxy = "89.32.230.38:8080";
}
if($rand == 981){
$proxy = "202.145.2.227:8585";
}
if($rand == 982){
$proxy = "206.123.214.4:443";
}
if($rand == 983){
$proxy = "186.103.169.166:8080";
}
if($rand == 984){
$proxy = "180.250.163.34:8888";
}
if($rand == 985){
$proxy = "93.51.247.104:80";
}
if($rand == 986){
$proxy = "62.176.13.22:8088";
}
if($rand == 987){
$proxy = "116.68.199.110:8080";
}
if($rand == 988){
$proxy = "109.224.56.210:8080";
}
if($rand == 989){
$proxy = "195.175.201.170:8080";
}
if($rand == 990){
$proxy = "59.38.32.35:1111";
}
if($rand == 991){
$proxy = "178.255.170.137:8080";
}
if($rand == 992){
$proxy = "82.114.82.58:8080";
}
if($rand == 993){
$proxy = "27.131.173.2:8080";
}
if($rand == 994){
$proxy = "94.100.50.54:8080";
}
if($rand == 995){
$proxy = "95.215.52.150:8080";
}
if($rand == 996){
$proxy = "168.63.24.174:8123";
}
if($rand == 997){
$proxy = "196.41.9.169:8585";
}
if($rand == 998){
$proxy = "196.41.9.26:8585";
}
if($rand == 999){
$proxy = "207.5.112.114:8080";
}
if($rand == 1000){
$proxy = "221.214.221.148:3128";
}
if($rand == 1001){
$proxy = "112.78.43.194:3128";
}
if($rand == 1002){
$proxy = "125.209.88.46:8080";
}
if($rand == 1003){
$proxy = "31.7.232.102:3128";
}
if($rand == 1004){
$proxy = "78.36.202.149:3129";
}
if($rand == 1005){
$proxy = "115.87.176.99:8080";
}
if($rand == 1006){
$proxy = "95.161.7.13:110";
}
if($rand == 1007){
$proxy = "216.171.205.9:8080";
}
if($rand == 1008){
$proxy = "80.188.79.138:8080";
}
if($rand == 1009){
$proxy = "118.97.148.204:8080";
}
if($rand == 1010){
$proxy = "110.49.210.113:8080";
}
if($rand == 1011){
$proxy = "62.240.104.131:8080";
}
if($rand == 1012){
$proxy = "202.148.2.254:8000";
}
if($rand == 1013){
$proxy = "180.250.88.173:3128";
}
if($rand == 1014){
$proxy = "91.121.153.214:3128";
}
if($rand == 1015){
$proxy = "90.155.154.76:8080";
}
if($rand == 1016){
$proxy = "200.192.248.74:8080";
}
if($rand == 1017){
$proxy = "77.55.245.38:3128";
}
if($rand == 1018){
$proxy = "178.124.180.246:8080";
}
if($rand == 1019){
$proxy = "139.255.40.130:8080";
}
if($rand == 1020){
$proxy = "186.103.149.50:8080";
}
if($rand == 1021){
$proxy = "176.110.163.230:3128";
}
if($rand == 1022){
$proxy = "183.87.118.14:8080";
}
if($rand == 1023){
$proxy = "202.166.195.100:8080";
}
if($rand == 1024){
$proxy = "110.232.83.38:8080";
}
if($rand == 1025){
$proxy = "121.199.60.143:3128";
}
if($rand == 1026){
$proxy = "212.13.49.186:8085";
}
if($rand == 1027){
$proxy = "137.135.166.225:8121";
}
if($rand == 1028){
$proxy = "94.100.63.2:8080";
}
if($rand == 1029){
$proxy = "182.156.90.58:8080";
}
if($rand == 1030){
$proxy = "187.60.47.46:8080";
}
if($rand == 1031){
$proxy = "121.101.214.160:80";
}
if($rand == 1032){
$proxy = "187.111.0.174:8080";
}
if($rand == 1033){
$proxy = "202.147.206.114:8080";
}
if($rand == 1034){
$proxy = "116.197.135.236:8080";
}
if($rand == 1035){
$proxy = "37.200.99.210:8118";
}
if($rand == 1036){
$proxy = "201.249.201.105:8089";
}
if($rand == 1037){
$proxy = "206.181.83.254:80";
}
if($rand == 1038){
$proxy = "221.237.155.64:9797";
}
if($rand == 1039){
$proxy = "110.232.76.150:18080";
}
if($rand == 1040){
$proxy = "164.115.226.153:8080";
}
if($rand == 1041){
$proxy = "211.77.5.41:3128";
}
if($rand == 1042){
$proxy = "60.250.81.97:80";
}
if($rand == 1043){
$proxy = "86.102.106.150:8080";
}
if($rand == 1044){
$proxy = "202.51.118.164:8080";
}
if($rand == 1045){
$proxy = "118.97.189.34:8080";
}
if($rand == 1046){
$proxy = "186.103.186.28:8080";
}
if($rand == 1047){
$proxy = "5.2.225.110:3128";
}
if($rand == 1048){
$proxy = "210.6.237.191:3128";
}
if($rand == 1049){
$proxy = "200.192.253.151:8080";
}
if($rand == 1050){
$proxy = "58.147.174.113:8080";
}
if($rand == 1051){
$proxy = "201.72.98.244:8088";
}
if($rand == 1052){
$proxy = "200.49.4.101:8080";
}
if($rand == 1053){
$proxy = "85.13.13.254:8080";
}
if($rand == 1054){
$proxy = "46.19.231.190:8080";
}
if($rand == 1055){
$proxy = "202.134.107.174:8080";
}
if($rand == 1056){
$proxy = "195.244.36.177:8080";
}
if($rand == 1057){
$proxy = "190.121.158.114:8080";
}
if($rand == 1058){
$proxy = "88.255.148.24:8080";
}
if($rand == 1059){
$proxy = "196.45.131.161:8080";
}
if($rand == 1060){
$proxy = "82.151.117.162:8080";
}
if($rand == 1061){
$proxy = "93.189.80.1:8080";
}
if($rand == 1062){
$proxy = "213.144.132.109:80";
}
if($rand == 1063){
$proxy = "115.239.210.199:80";
}
if($rand == 1064){
$proxy = "177.234.12.202:3128";
}
if($rand == 1065){
$proxy = "80.82.69.72:3128";
}
if($rand == 1066){
$proxy = "85.13.13.100:8080";
}
if($rand == 1067){
$proxy = "111.119.192.34:8080";
}
if($rand == 1068){
$proxy = "202.166.195.113:8080";
}
if($rand == 1069){
$proxy = "183.87.129.242:8080";
}
if($rand == 1070){
$proxy = "116.213.51.205:8080";
}
if($rand == 1071){
$proxy = "99.185.0.108:3128";
}
if($rand == 1072){
$proxy = "124.115.211.30:9999";
}
if($rand == 1073){
$proxy = "203.160.56.116:8080";
}
if($rand == 1074){
$proxy = "63.221.140.143:80";
}
if($rand == 1075){
$proxy = "46.16.226.10:8080";
}
if($rand == 1076){
$proxy = "202.57.10.138:8080";
}
if($rand == 1077){
$proxy = "190.113.162.142:8080";
}
if($rand == 1078){
$proxy = "118.97.255.106:8080";
}
if($rand == 1079){
$proxy = "109.196.127.35:8888";
}
if($rand == 1080){
$proxy = "202.59.160.10:8080";
}
if($rand == 1081){
$proxy = "94.247.25.163:80";
}
if($rand == 1082){
$proxy = "60.250.81.118:8080";
}
if($rand == 1083){
$proxy = "200.213.158.51:8080";
}
if($rand == 1084){
$proxy = "186.103.169.164:8080";
}
if($rand == 1085){
$proxy = "42.121.105.155:8888";
}
if($rand == 1086){
$proxy = "202.51.102.34:8080";
}
if($rand == 1087){
$proxy = "201.116.227.169:3128";
}
if($rand == 1088){
$proxy = "202.59.163.129:8080";
}
if($rand == 1089){
$proxy = "220.157.107.14:8080";
}
if($rand == 1090){
$proxy = "94.247.25.164:80";
}
if($rand == 1091){
$proxy = "91.196.230.66:3128";
}
if($rand == 1092){
$proxy = "24.172.34.114:8181";
}
if($rand == 1093){
$proxy = "176.194.189.56:8080";
}
if($rand == 1094){
$proxy = "89.234.195.145:80";
}
if($rand == 1095){
$proxy = "89.234.199.181:8000";
}
if($rand == 1096){
$proxy = "190.102.17.180:80";
}
if($rand == 1097){
$proxy = "190.92.87.18:8080";
}
if($rand == 1098){
$proxy = "1.179.147.2:8080";
}
if($rand == 1099){
$proxy = "180.247.19.96:8080";
}
if($rand == 1100){
$proxy = "190.0.33.18:3128";
}
if($rand == 1101){
$proxy = "115.117.45.8:8080";
}
if($rand == 1102){
$proxy = "78.83.201.101:8081";
}
if($rand == 1103){
$proxy = "80.253.28.174:8080";}


$url = "http://whatismyip.org";

echo $proxy;
 
$timeout = 30;

$data = "";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0); // no headers in the output
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // output to variable
curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
$data = curl_exec($ch);
curl_close($ch);
 
echo $data;


/*
echo "something";
$url = "http://whatismyip.org";
$curl = curl_init();
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.12) Gecko/20101026 Firefox/3.6.12');
curl_setopt($curl, CURLOPT_URL, $url);
$timeout = 30;
//curl_setopt($curl, CURLOPT_PROXYPORT, "80");
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
//curl_setopt($curl, CURLOPT_USERPWD, "reterik:hid3myass");
//curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_PROXYTYPE, 'HTTP');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
curl_setopt($curl, CURLOPT_MAXREDIRS, 5);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
	$info = curl_getinfo($curl);
	//print_r($info);
    $hlength  = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	$contents = curl_exec($curl);
    //$body     = substr($response, $hlength);
	//$htmdata = $body;
	curl_close($curl);
	//echo $htmdata;
	$htmdata = $contents;
	echo $htmdata;
    return $htmdata;
    
*/

}



function fetchUrlPrivoxy($uri) {
$service_url = $uri;
$ch = curl_init($service_url);
curl_setopt($ch, CURLOPT_URL, $service_url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_PROXY, "127.0.0.1:9050");
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$redirectURL = curl_getinfo($ch,CURLINFO_EFFECTIVE_URL );
$curl_response = curl_exec($ch);
echo $curl_response; 
echo $redirectURL;
$htmdata = $curl_response;
echo $htmdata;
    return $htmdata;

}


function verbose($text)
{
	echo $text;
}
 
/*
 * By default (no force) the function will load cached data within 24 hours otherwise reject the cache.
 * Google does not change its ranking too frequently, that's why 24 hours has been chosen.
 *
 * Multithreading: When multithreading you need to work on a proper locking mechanism
 */
function load_cache($search_string,$page,$country_data,$force_cache)
{
	global $working_dir;
	global $NL;
	global $test_100_resultpage;
	
	if ($force_cache < 0) return NULL;
	$lc=$country_data['lc'];
	$cc=$country_data['cc'];
	if ($test_100_resultpage)
		$hash=md5($search_string."_".$lc."_".$cc.".".$page.".100p");
	else
		$hash=md5($search_string."_".$lc."_".$cc.".".$page);
	$file="$working_dir/$hash.cache";
	$now=time();
	if (file_exists($file))
	{
		$ut=filemtime($file);
		$dif=$now-$ut;
		$hour=(int)($dif/(60*60));
		if ($force_cache || ($dif < (60*60*24)))
		{
			$serdata=file_get_contents($file);
			$serp_data=unserialize($serdata);
			verbose("Cache: loaded file $file for $search_string and page $page. File age: $hour hours$NL");
			return $serp_data;
		}
		return NULL;
	} else
	 return NULL;

}

/*
 * Multithreading: When multithreading you need to work on a proper locking mechanism
 */
function store_cache($serp_data,$search_string,$page,$country_data)
{
	global $working_dir;
	global $NL;
	global $test_100_resultpage;
	
	$lc=$country_data['lc'];
	$cc=$country_data['cc'];
	if ($test_100_resultpage)
		$hash=md5($search_string."_".$lc."_".$cc.".".$page.".100p");
	else
		$hash=md5($search_string."_".$lc."_".$cc.".".$page);
	$file="$working_dir/$hash.cache";
	$now=time();
	if (file_exists($file))
	{
		$ut=filemtime($file);
		$dif=$now-$ut;
		if ($dif < (60*60*24)) echo "Warning: cache storage initated for $search_string page $page which was already cached within the past 24 hours!$NL";
	}
	$serdata=serialize($serp_data);
	
$conn = db_connect();
$myNewArray = unserialize($serdata);
$last = count($myNewArray) - 1;
foreach ($myNewArray as $i => $row)
{
    $isFirst = ($i == 0);
    $isLast = ($i == $last);
    $title = $row['title'];
    $trim = $row['url'];
    $host = $row['host'];
    $trimmed = $row['url'];
	$strlen = strlen($trimmed);
	$length = strrpos($trimmed, '&sa=');
	if ($length === FALSE) {
	  $length = $strlen;
	}
	$result = substr($trimmed, 0, $length);
	$result = str_replace("'", "%27", $result);
	$search_string = urldecode($search_string);
	$mysqltime = date("Y-m-d H:i:s");
	print_r($row);
		if ($stmt = mysqli_prepare($conn, "INSERT INTO `scraper`.`results` (`title`, `url`, `host`, `seoterm`, `date`) VALUES (?,?,?,?,?)")); {
			mysqli_stmt_bind_param($stmt, "sssss", $title, $result, $host, $search_string, $mysqltime);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
		}
		
}
	
	file_put_contents($file,$serdata, LOCK_EX);
	verbose("Cache: stored file $file for $search_string and page $page.$NL");
}

// check_ip_usage() must be called before first use of mark_ip_usage()
function check_ip_usage()
{
	global $PROXY;
	global $working_dir;
	global $NL;
	global $ip_usage_data; // usage data object as array
	
	if (!isset($PROXY['ready'])) return 0; // proxy not ready/started
	if (!$PROXY['ready']) return 0; // proxy not ready/started
	
	if (!isset($ip_usage_data))
	{
		if (!file_exists($working_dir."/ipdata.obj")) // usage data object as file
		{
			echo "Warning!$NL"."The ipdata.obj file was not found, if this is the first usage of the rank checker everything is alright.$NL"."Otherwise removal or failure to access the ip usage data will lead to damage of the IP quality.$NL$NL";
			sleep(5);
			$ip_usage_data=array();
		} else
		{
			$ser_data=file_get_contents($working_dir."/ipdata.obj");
			$ip_usage_data=unserialize($ser_data);
		}
	}
	
	if (!isset($ip_usage_data[$PROXY['external_ip']])) 
	{
		verbose("IP $PROXY[external_ip] is ready for use $NL");
		return 1; // the IP was not used yet
	}
	if (!isset($ip_usage_data[$PROXY['external_ip']]['requests'][20]['ut_google'])) 
	{
		verbose("IP $PROXY[external_ip] is ready for use $NL");
		return 1; // the IP has not been used 20+ times yet, return true
	}
	$ut_last=(int)$ip_usage_data[$PROXY['external_ip']]['ut_last-usage']; // last time this IP was used
	$req_total=(int)$ip_usage_data[$PROXY['external_ip']]['request-total']; // total number of requests made by this IP
	$req_20=(int)$ip_usage_data[$PROXY['external_ip']]['requests'][20]['ut_google']; // the 20th request (if IP was used 20+ times) unixtime stamp
	
	$now=time();
	if (($now - $req_20) > (60*60) ) 
	{
		verbose("IP $PROXY[external_ip] is ready for use $NL");
		return 1; // more than an hour passed since 20th usage of this IP
	} else
	{
		$cd_sec=(60*60) - ($now - $req_20);
		verbose("IP $PROXY[external_ip] needs $cd_sec seconds cooldown, not ready for use yet $NL");
		return 0; // the IP is overused, it can not be used for scraping without being detected by the search engine yet
	}
	
}


// return 1 if license is ready, otherwise 0
function get_license()
{
	global $uid;
	global $pwd;
	global $LICENSE;
	global $NL;
	
	$res=proxy_api("hello"); // will fill $LICENSE
	$ip="";
	if ($res <= 0)
	{
		verbose("API error: Proxy API connection failed (Error $res). trying again soon..$NL$NL");
		return 0;
	} else
	{
		($LICENSE['active']==1) ? $ready="active" : $ready="not active";
		verbose("API success: License is $ready.$NL");
		if ($LICENSE['active']==1) return 1;
		return 0;
	}
	
	return $LICENSE;
}

/* Delay (sleep) based on the license size to allow optimal scraping
 *
 * Warning!
 * Do NOT change the delay to be shorter than the specified delay.
 * When scraping Google you should never do more than 20 requests per hour per IP address
 * This function will create a delay based on your total IP addresses.
 *
 * Together with the IP management functions this will ensure that your IPs stay healthy (no wrong rankings) and undetected (no virus warnings, blacklists, captchas)
 *
 * Multithreading:
 * When multithreading you need to multiply the delay time ($d) by the number of threads
 */
function delay_time()
{
	global $NL;
	global $LICENSE;
	
	$d=(3600*1000000/(((float)$LICENSE['total_ips'])*19.9));
	verbose("Delay based on license size, please wait.. $NL");
	usleep($d);
}

/*
 * Updates and stores the ip usage data object
 * Marks an IP as used and re-sorts the access array 
 */
function mark_ip_usage()
{
	global $PROXY;
	global $working_dir;
	global $NL;
	global $ip_usage_data; // usage data object as array
	
	if (!isset($ip_usage_data)) die("ERROR: Incorrect usage. check_ip_usage() needs to be called once before mark_ip_usage()!$NL");
	$now=time();
	
	$ip_usage_data[$PROXY['external_ip']]['ut_last-usage']=$now; // last time this IP was used
	if (!isset($ip_usage_data[$PROXY['external_ip']]['request-total'])) $ip_usage_data[$PROXY['external_ip']]['request-total']=0;
	$ip_usage_data[$PROXY['external_ip']]['request-total']++; // total number of requests made by this IP
	// shift fifo queue
	for ($req=19;$req>=1;$req--)
	{
		if (isset($ip_usage_data[$PROXY['external_ip']]['requests'][$req]['ut_google']))
		{
			$ip_usage_data[$PROXY['external_ip']]['requests'][$req+1]['ut_google']=$ip_usage_data[$PROXY['external_ip']]['requests'][$req]['ut_google']; 
		}
	}
	$ip_usage_data[$PROXY['external_ip']]['requests'][1]['ut_google']=$now; 
	
	$serdata=serialize($ip_usage_data);
	file_put_contents($working_dir."/ipdata.obj",$serdata, LOCK_EX);
	
}


// access google based on parameters and return raw html or "0" in case of an error
function scrape_serp_google($search_string,$page,$local_data)
{
	global $ch;
	global $NL;
	global $PROXY;
	global $LICENSE;
	global $scrape_result;
	global $test_100_resultpage;
	global $filter;
	$scrape_result="";
	
	$google_ip="google.com";
	$hl=$local_data['lc'];

	//verbose("Debug, Search URL: $url$NL");

	$url="http://www.google.com/search?q=".$search_string."&ie=utf-8&oe=utf-8&aq=t&rls=org.mozilla:en-US:official&client=firefox-a";
	$url="http://www.google.com/search?q=".$search_string."&amp;hl=en&amp;ie=utf-8&as_qdr=all&amp;aq=t&amp;rls=org:mozilla:us:official&amp;client=firefox&num=100&filter=1";
	$htmdata = fetchUrl($url, $proxy = NULL, $post_data = NULL, $timeout = 30, $userpass = NULL);
	return $htmdata;
}


function rotate_proxy()
{
	global $PROXY;
	global $ch;
	global $NL;
	$max_errors=3;
	$success=0;
	while ($max_errors--)
	{
		$res=proxy_api("rotate");  // will fill $PROXY
		$ip="";
		if ($res <= 0)
		{
			verbose("API error: Proxy API connection failed (Error $res). trying again soon..$NL$NL");
			sleep(21); // retry after a while
		} else
		{
			verbose("API success: Received proxy IP $PROXY[external_ip] on port $PROXY[port]$NL");
			$success=1;
			break;
		}
	}
	if ($success)
	{
		$ch=new_curl_session($ch);
		return 1;
	} else
		return "API rotation failed. Check license, firewall and API credentials.$NL";
}

/*
 * This is the API function for $portal.seo-proxies.com, currently supporting the "rotate" command
 * On success it will define the $PROXY variable, adding the elements ready,address,port,external_ip and return 1
 * On failure the return is <= 0 and the PROXY variable ready element is set to "0"
 */
function extractBody($response_str)
{
	$parts = preg_split('|(?:\r?\n){2}|m', $response_str, 2);
	if (isset($parts[1])) return $parts[1];
	return '';
}
function proxy_api($cmd,$x="")
{
	global $pwd;
	global $uid;
	global $PROXY;
	global $LICENSE;
	global $NL;
	global $portal;
	$fp = fsockopen("$portal.seo-proxies.com", 80);
	if (!$fp) 
	{
		echo "Unable to connect to proxy API $NL";
		return -1; // connection not possible
	} else 
	{
		if ($cmd == "hello")
		{
			fwrite($fp, "GET /api.php?api=1&uid=$uid&pwd=$pwd&cmd=hello&extended=1 HTTP/1.0\r\nHost: $portal.seo-proxies.com\r\nAccept: text/html, text/plain, text/*, */*;q=0.01\r\nAccept-Encoding: plain\r\nAccept-Language: en\r\n\r\n");
			
					 	stream_set_timeout($fp, 8);
			$res="";
			$n=0;
			while (!feof($fp)) 
			{
				if ($n++ > 4) break;
	  			$res .= fread($fp, 8192);
			}
		 	$info = stream_get_meta_data($fp);
		 	fclose($fp);
		
		 	if ($info['timed_out']) 
			{
				echo 'API: Connection timed out! $NL';
				$LICENSE['active']=0;
				return -2; // api timeout
		  } else 
			{
				if (strlen($res) > 1000) return -3; // invalid api response (check the API website for possible problems)
				$data=extractBody($res);
				$ar=explode(":",$data);
				if (count($ar) < 4) return -100; // invalid api response
				switch ($ar[0])
				{
					case "ERROR":
						echo "API Error: $res $NL";
						$LICENSE['active']=0;
						return 0; // Error received
					break;
					case "HELLO":
					  $LICENSE['max_ips']=$ar[1]; 	// number of IPs licensed
						$LICENSE['total_ips']=$ar[2]; // number of IPs assigned
						$LICENSE['protocol']=$ar[3]; 	// current proxy protocol (http, socks, vpn)
						$LICENSE['processes']=$ar[4]; // number of proxy processes
						if ($LICENSE['total_ips'] > 0) $LICENSE['active']=1; else $LICENSE['active']=0;
						return 1;
					break;
					default:
						echo "API Error: Received answer $ar[0], expected \"HELLO\"";
						$LICENSE['active']=0;
						return -101; // unknown API response
				}
			}
			
		} // cmd==hello
		
		
		
		if ($cmd == "rotate")
		{
			$PROXY['ready']=0;
			fwrite($fp, "GET /api.php?api=1&uid=$uid&pwd=$pwd&cmd=rotate&randomness=0&offset=0 HTTP/1.0\r\nHost: $portal.seo-proxies.com\r\nAccept: text/html, text/plain, text/*, */*;q=0.01\r\nAccept-Encoding: plain\r\nAccept-Language: en\r\n\r\n");
		 	stream_set_timeout($fp, 8);
			$res="";
			$n=0;
			while (!feof($fp)) 
			{
				if ($n++ > 4) break;
	  			$res .= fread($fp, 8192);
			}
		 	$info = stream_get_meta_data($fp);
		 	fclose($fp);
		
		 	if ($info['timed_out']) 
			{
				echo 'API: Connection timed out! $NL';
				return -2; // api timeout
		  } else 
			{
				if (strlen($res) > 1000) return -3; // invalid api response (check the API website for possible problems)
				$data=extractBody($res);
				$ar=explode(":",$data);
				if (count($ar) < 4) return -100; // invalid api response
				switch ($ar[0])
				{
					case "ERROR":
						echo "API Error: $res $NL";
						return 0; // Error received
					break;
					case "ROTATE":
						$PROXY['address']=$ar[1];
						$PROXY['port']=$ar[2];
						$PROXY['external_ip']=$ar[3];
						$PROXY['ready']=1;
						usleep(250000); // additional time to avoid connecting during proxy bootup phase, to be 100% sure 1 second needs to be waited
						return 1;
					break;
					default:
						echo "API Error: Received answer $ar[0], expected \"ROTATE\"";
						return -101; // unknown API response
				}
	 		}
	 	} // cmd==rotate
	}
}



function dom2array($node) 
{
  $res = array();
  if($node->nodeType == XML_TEXT_NODE)
  {
  	$res = $node->nodeValue;
  } else
  {
  	if($node->hasAttributes())
  	{
  		$attributes = $node->attributes;
  		if(!is_null($attributes))
  		{
  			$res['@attributes'] = array();
  			foreach ($attributes as $index=>$attr) 
  			{
  				$res['@attributes'][$attr->name] = $attr->value;
  			}
  		}
  	}
  	if($node->hasChildNodes())
  	{
  		$children = $node->childNodes;
  		for($i=0;$i<$children->length;$i++)
  		{
  			$child = $children->item($i);
  			$res[$child->nodeName] = dom2array($child);
  		}
  		$res['textContent']=$node->textContent;
  	}
  }
  return $res;
}


function getContent(&$NodeContent="",$nod)
{    
	$NodList=$nod->childNodes;
	for( $j=0 ;  $j < $NodList->length; $j++ )
	{ 
		$nod2=$NodList->item($j);
		$nodemane=$nod2->nodeName;
		$nodevalue=$nod2->nodeValue;
		if($nod2->nodeType == XML_TEXT_NODE)
		    $NodeContent .= $nodevalue;
		else
		{     $NodeContent .= "<$nodemane ";
		   $attAre=$nod2->attributes;
		   foreach ($attAre as $value)
		      $NodeContent .= "{$value->nodeName}='{$value->nodeValue}'" ;
		    $NodeContent .= ">";                    
		    getContent($NodeContent,$nod2);                    
		    $NodeContent .= "</$nodemane>";
		}
	}
   
}


function dom2array_full($node)
{
    $result = array();
    if($node->nodeType == XML_TEXT_NODE) 
    {
    	$result = $node->nodeValue;
    } else 
    {
    	if($node->hasAttributes()) 
    	{
    		$attributes = $node->attributes;
    		if((!is_null($attributes))&&(count($attributes))) 
    			foreach ($attributes as $index=>$attr) 
    		  	$result[$attr->name] = $attr->value;
    	}
    	if($node->hasChildNodes())
    	{
    		$children = $node->childNodes;
    		for($i=0;$i<$children->length;$i++) 
    		{
    			$child = $children->item($i);
    			if($child->nodeName != '#text')
    			if(!isset($result[$child->nodeName]))
    				$result[$child->nodeName] = dom2array($child);
    			else 
    			{
    				$aux = $result[$child->nodeName];
    				$result[$child->nodeName] = array( $aux );
    				$result[$child->nodeName][] = dom2array($child);
    			}
    		}
    	}
    }
    return $result;
} 


function getip()
{
	global $PROXY;
	if (!$PROXY['ready']) return -1; // proxy not ready
	
	$curl_handle=curl_init();
	curl_setopt($curl_handle,CURLOPT_URL,'http://squabbel.com/ipxx.php'); // this site will return the plain IP address, great for testing if a proxy is ready
	curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,10);
	curl_setopt($curl_handle,CURLOPT_TIMEOUT,10);
	curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
	$curl_proxy = "$PROXY[address]:$PROXY[port]";
	curl_setopt($curl_handle, CURLOPT_PROXY, $curl_proxy);
	$tested_ip=curl_exec($curl_handle);
	
  if(preg_match("^([1-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}^", $tested_ip))
  {
  	curl_close($curl_handle);
		return $tested_ip;
	}
  else
  {
  	$info = curl_getinfo($curl_handle);
  	curl_close($curl_handle);
    return 0; // possible error would be a wrong authentication IP or a firewall
  }
}


function new_curl_session($ch=NULL)
{
	global $PROXY;
	if ((!isset($PROXY['ready'])) || (!$PROXY['ready'])) return $ch; // proxy not ready
	
	if (isset($ch) && ($ch != NULL)) 
		curl_close($ch);
  $ch = curl_init();
  curl_setopt ($ch, CURLOPT_HEADER, 0);
  curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER , 1);
  $curl_proxy = "$PROXY[address]:$PROXY[port]";
  curl_setopt($ch, CURLOPT_PROXY, $curl_proxy);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
  curl_setopt($ch, CURLOPT_TIMEOUT, 20);
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en; rv:1.9.0.4) Gecko/2009011913 Firefox/3.0.6");
	return $ch;
}


function rmkdir($path, $mode = 0755) {
    if (file_exists($path)) return 1;
    return @mkdir($path, $mode);
}


/*
 * For country&language specific searches
 */
function get_google_cc($cc,$lc)
{
	global $pwd;
	global $uid;
	global $PROXY;
	global $LICENSE;
	global $NL;
        global $portal;
	$fp = fsockopen("$portal.seo-proxies.com", 80);
	if (!$fp) 
	{
		echo "Unable to connect to google_cc API $NL";
		return NULL; // connection not possible
	} else 
	{
			fwrite($fp, "GET /g_api.php?api=1&uid=$uid&pwd=$pwd&cmd=google_cc&cc=$cc&lc=$lc HTTP/1.0\r\nHost: $portal.seo-proxies.com\r\nAccept: text/html, text/plain, text/*, */*;q=0.01\r\nAccept-Encoding: plain\r\nAccept-Language: en\r\n\r\n");
			stream_set_timeout($fp, 8);
			$res="";
			$n=0;
			while (!feof($fp)) 
			{
				if ($n++ > 4) break;
	  			$res .= fread($fp, 8192);
			}
		 	$info = stream_get_meta_data($fp);
		 	fclose($fp);
		
		 	if ($info['timed_out']) 
			{
				echo 'API: Connection timed out! $NL';
				return NULL; // api timeout
		  } else 
			{
				$data=extractBody($res);
				$obj=unserialize($data);
				if (isset($obj['error'])) echo $obj['error']."$NL";
				if (isset($obj['info'])) echo $obj['info']."$NL";
				return $obj['data'];
				
				if (strlen($data) < 4) return NULL; // invalid api response
			}
	}
}


?>
