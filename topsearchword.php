<?php
include('db.php');
$conn = db_connect_scraper_100();
$conn1 = db_connect_100();

 $today = date('Y-m-d');
        $query1 = "SELECT `title`, `url`, `key_url` FROM `scraper`.`feed` WHERE `date` = '".$today."';";

        if ($stmt1 = mysqli_prepare($conn1, $query1)) {
                        mysqli_stmt_execute($stmt1);
                mysqli_stmt_bind_result($stmt1, $title, $fetch, $key);
                while (mysqli_stmt_fetch($stmt1)) {

$place = "";
$place1 = "";
$place2 = "";
$search = "";

if(isset($_GET['search'])){
$search = strip_tags(stripslashes($_GET['search']));
}

if (stripos(strtolower($title), $search) !== false) {
$place = $title;
$place2 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$fetch."'>a</a>&nbsp;";
$place1 = $key."<br>";

}

/*
doctor
health
phd
zuckerberg
cell
battery
democrat
print
scan
autonomous
dna
gene
saudi
musk
Bezos
larry page
bill gates
system
economy
manufacturer
Microsoft
samsung
networking
tesla
stock
neuron
dump
mysql
nvidia
meme
solar
instagram
tumblr
snapchat
linkedin
twitter	
whatsapp
brain
conservative
linux
rocket
satellite
space
asteroid
facebook
google
microsoft
oracle
apple
intel
vr
virtual
bionic
processor
nand
machine learning
database
data
php
datum
artificial intelligence
anonymous
open source
gnu
software
bot
internet
tech
fund
bitcoin
hedge
blockchain
encryption
ubuntu
android
robot
drone
cyber
hacker
implant
genomic
nano
millennial
biometric
usa
america
china
germany
ceo
stem
ibm
vuln
exploit
security
founder
congress
unitarian
telemetry
senate
republican
obama
government
web
science
arduino
iot
app
application
banking
rfid
hard drive
substrate
warfare
scan
search
economy
fbi
nsa
cia
dod
fintech
iphone
analytics
liberal
trump
russia
los angeles
ios
cloud
electric
laser
us
gov
police
market
trend
forecast
radar
cagr
growth
putin
computer
computing
Illuminati
imf
$
chat
code
billion
million
trillion
*/

				
echo $place;
echo $place2;
echo $place1;
                }
                mysqli_stmt_close($stmt1);
        }      
       


?>