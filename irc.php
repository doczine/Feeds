<?php
 
$server = "irc.quakenet.org";
$port = 6667;
$nick = "sockbotphp";
$ident = "sockbot";
$realname = "socket bot php";
 
$bot_connection = fsockopen("$server",$port);
fputs($bot_connection, "NICK $nick \n");
fputs($bot_connection, "USER $ident - - : $realname \n");
fputs($bot_connection, "JOIN #localhost \n");
 
?>
