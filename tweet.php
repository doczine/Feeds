<?php
require_once 'Oauth.php';
define("CONSUMER_KEY", "xelkRdm2xjVrT09PRhgEbN7Cb");
define("CONSUMER_SECRET","tdjMRPjpZWXzqWzFAmusvV35Le0wBSN7MXDRJAd7akNjcA1Czv");
define("OAUTH_TOKEN", "2842289662-SNOy7HUJMEMYKLK2rulYuXCnDRROU9yygfokfCF");
define("OAUTH_SECRET", "lytI4meqZuxUuVSNAwp68Ewz4MjeoCMZSXItpZpCdQ2zg");
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN, OAUTH_SECRET);
$content = $connection->get('account/verify_credentials');
$connection->post('statuses/update', array('status' => 'Testing PHP API Calls')); 
?>
