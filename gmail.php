<?php
 
$gmail_username = 'joeemailaddy@gmail.com';
$gmail_password = 'h8t3rl8t3r12345';
$imap = imap_open ("{imap.gmail.com:993/imap/ssl}INBOX", $gmail_username, $gmail_password) or die("can't connect: " . imap_last_error());
$savefilepath = '//Server/share/Local/Pathname/'; //absolute path to images directory
$imagefilepath = '/Local/Pathname/'; //relative path to images directory
$savethumbpath = '/Local/Pathname/'; //relative path to images directory
$headers = imap_headers($imap);
foreach ($headers as $mail) {
    $flags = substr($mail, 0, 4);
    //Check for unread msgs, get their UID, and queue them up
    if (strpos($flags, "U")) {
        preg_match('/[0-9]+/',$mail,$match);
        $new_msg[] = implode('',$match);    
    }
}
if ($new_msg) {
    foreach ($new_msg as $result) {
        $structure = imap_fetchstructure($imap,$result);
        $parts = $structure->parts;
        foreach ($parts as $part) {
            if ($part->parameters[0]->attribute == "NAME") {
                //Generate a filename with format DATE_RANDOM#_ATTACHMENTNAME.EXT
                $savefilename = date("m-d-Y") . '_' . rand() . '_' . $part->parameters[0]->value;
                   save_attachment(imap_fetchbody($imap,$result,2),$savefilename,$savefilepath,$savethumbpath);
                imap_fetchbody($imap,$result,2); //This marks message as read
            }
        }
    }
}
/* grab emails */
$emails = imap_search($imap,'ALL');
/* if emails are returned, cycle through each... */
if($emails) {
  /* put the newest emails on top */
  $total = imap_num_msg($imap);
  /* for every email... */
  for( $i = $total; $i >= 1; $i--) {
        $headers = imap_header($imap, $i);
        $from = $headers->from[0]->mailbox . "@" . $headers->from[0]->host;
        echo $from . "n";
        imap_delete($imap,$i);
        imap_mail_move($imap,"$i:$i", "[Gmail]/Trash"); // Change or remove this line if you are not connecting to gmail. The path to the Trash folder in your Gmail may be different, capitalization is relevant.
  }
}else{
        echo "no emails";
}
/* close the connection */
   imap_expunge($imap);
   imap_close($imap);
 
function save_attachment( $content , $filename , $localfilepath, $thumbfilepath ) {
     if (imap_base64($content) != FALSE) {  
         $file = fopen($localfilepath.$filename, 'w');
         fwrite($file, imap_base64($content));
         fclose($file);
     }
}
?>
