<?php
/*
        Source: https://www.youtube.com/watch?v=zYocypr0Xig
*/
$name = $_POST['name'];
$from = $_POST['email'];
$phone = $_POST['phone'];
$to = "mail@mail.com";
$subject = "Subject";
$message = $name." ".$phone."\n";
 
$file_name = $_FILES['attachment']['name'];
$temp_name = $_FILES['attachment']['tmp_name'];
$file_type = $_FILES['attachment']['type'];
 
$file = $temp_name;
$content = chunk_split(base64_encode(file_get_contents($file)));
$uid = md5(uniqid(time()));
 
//mail headers
$header = "From: ".$from."\r\n";
$header .= "MIME-Version: 1.0\r\n";
 
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
$header .= "This is a multi-part message in MIME format.\r\n";
 
//text
$header .= "--".$uid."\r\n";
$header .= "Content-Type:text/plain; charset=iso-8859-1\r\n";
$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$header .= $message."\r\n\r\n";
 
//multipart
$header .= "--".$uid."\r\n";
$header .= "Content-Type: ".$file_type."; name=\"".$file_name."\"\r\n";
$header .= "Content-Transfer-Encoding: base64\r\n";
$header .= "Content-Disposition: attachment; filename=\"".$file_name."\"\r\n";
$header .= $content."\r\n\r\n";
 
if(mail($to,$subject,"",$header)){
        echo ":)";
}
else{
        echo ":(";
}
 
 
?>
