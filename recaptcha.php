<?php
$db = mysqli_connect("localhost","root","password","database_name");
 
function getresponse($url)
{
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_TIMEOUT, 15);
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
$curlData = curl_exec($curl);
curl_close($curl);
return $curlData;
}
 
$msg='';
if($_SERVER["REQUEST_METHOD"] == "POST")
{ $recaptcha=$_POST['g-recaptcha-response'];
        if(!empty($recaptcha))
        {
                $google_url="https://www.google.com/recaptcha/api/siteverify";
                $secret='Inout Google Secret Key';
                $ip=$_SERVER['REMOTE_ADDR'];
                $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
                $res=getCurlData($url);
                $res= json_decode($res, true);
                if($res['success'])
                        {
                        //Get Username , Password from Database
                        //Match and Check verify login details
                        //Create Session
                        }
                else
                        {
                        $msg="Sorry. Re-enter your reCAPTCHA.";
                        }
 
        }
       
        else
        {
                $msg="Sorry. Re-enter your reCAPTCHA.";
        }
 
}
?>
 
<!doctype html>
<html lang="en">
        <head>
                <meta charset="UTF-8" />
                <title>Google reCaptcha 2</title>
                <script src="https://www.google.com/recaptcha/api.js"></script>
        </head>
<body>
        <form action="" method="post">
        Username <input type="text" name="username" class="input" />
        Password <input type="password" name="password" class="input" />
        <div class="g-recaptcha" data-sitekey="Insert Google Site Key"></div>
        <input type="submit"  value="Log In" />
        <span class='msg'><?php echo $msg; ?></span>
        </form>
</body>
</html>
