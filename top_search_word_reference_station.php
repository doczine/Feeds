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


#navigation {
    width: 100%;
    background-color: lightgray;
    height: 45px;
}
#floater {
    background-color: red;
    position: fixed;
    top: 55px;
    right: 0;
    height: 40px;
    width: 100px;
}

<div id="navigation">
    <a href="#">Nav Item 1</a>&nbsp;
</div>
<div id="floater">Floater</div>
<div id="content">
</div>




<style>
#navigation {
    width: 100%;
    background-color: lightgray;
    height: 45px;
}
#floater {
    background-color: red;
    position: fixed;
    top: 55px;
    right: 0;
    height: 600px;
    width: 200px;
}
</style>

<div id="navigation">
</div>
<div id="floater">
<script type="text/javascript">
  ( function() {
    if (window.CHITIKA === undefined) { window.CHITIKA = { 'units' : [] }; };
    var unit = {"calltype":"async[2]","publisher":"reterik","width":160,"height":600,"sid":"Chitika Default"};
    var placement_id = window.CHITIKA.units.length;
    window.CHITIKA.units.push(unit);
    document.write('<div id="chitikaAdBlock-' + placement_id + '"></div>');
}());
</script>
<script type="text/javascript" src="//cdn.chitika.net/getads.js" async></script>
</div>

}

/*

12900614 records (224 ignored, 85 bad) in 79 seconds, 163298/sec



 U.s. 23, Russia 18, Flynn 15, Michael Flynn 12, Cnn 11, Us 9, United States 9, Invokana 7, Moscow 7, Yemen 6, Devin Nunes 6, Nunes 6, Cyril 5, Isis 5, Atlanta 5, Paraguay 4, Virginia 4, Paul 3, Adam Schiff 3, Trump 3
  U.s. 15, Russia 13, Michael Flynn 10, Cnn 10, Flynn 9, Us 9, Yemen 6, Paraguay 6, Nunes 6, At&t 6, Eu 6, Steve 6, Isis 5, United States 5, Donald Trump 4, Kevin 4, Cyril 4, Virginia 4, Venezuela 4, Moscow 4
  ondon 6, Theresa 6, Europe 6, U.s. 4, Italy 4, Samsung 4, Us 3, Nasa 3, Russia 3, European Union 3, China 3, Britain 3, Opec 2, Hyundai 2, Ford 2, U.k. 2, Westinghouse 2, Obama Administration 2, Dublin 2, Erik Schatzker 1
   Trump 19, Donald Trump 13, Russia 11, Flynn 8, Washington 8, Fbi 6, Ohio 6, Us 6, D.c. 5, Michael Flynn 5, Lynn 4, Isis 4, Moscow 4, Fred 4, United States 4, Neil Gorsuch 4, Cnn 3, Sally Yates 3, Obama Administration 3, Mike 3
    Russia 12, U.s. 11, Nunes 9, Breo 8, Nato 8, Michael Flynn 6, Us 6, Europe 4, London 4, Sean Spicer 4, Ivanka 4, Assad 3, Tennessee 3, Trump 3, Mercedes-benz 3, Mexico 3, Ryan 3, Devin Nunes 3, Isis 3, Cnn 3
     Flynn 12, Russia 9, Ryan 8, America 7, Us 7, Nunes 7, Washington 5, Adam Schiff 5, Schiff 5, Devin Nunes 5, Cnn 5, Syria 4, Trump 4, Isis 4, Jason 4, Yemen 3, Usaa 3, Fbi 3, Ben 3, Julia 3
      America 9, Chicago 5, Us 5, China 4, New York 4, Britain 3, Washington 3, J.p. Morgan 2, Economy 2, Citi 2, United States 2, Russia 2, Sandy 2, U.s. 2, Caterpillar 1, Ge 1, The Board 1, Bernie Marcus 1, Steve 1, J.p. Morgan Chase 1
       Harvoni 8, Philly 6, Costco 3, Kimmel 3, Us 3, Harry Potter 3, Wilmington 2, Jim 2, America 2, Fios Mobile 1, Verizon Wireless 1, Villanova 1, Schenectady New York 1, Hep C 1, Cincinnati 1, New Orleans 1, Hbo 1, The Rain 1, Louie 1, Accuweather 1
       
Mark\ Warner
Sally\ Yates
Joe\ Manchin
Adam\ Schiff
Sean\ Spicer
Jared\ Kushner
Michael\ Flynn
Steve\ Bannon
Chuck\ Schumer\ 
claire\ mccaskill
rex\ tillerson
roy\ cooper
lindsey\ graham
Elena\ Kagan
sotomayor
bill pascrell
paul manafort
debbie wasserman schultz
nancy pelosi
wilbur ross

select * from results into outfile '/var/lib/mysql-files/export.csv';


SHOW
BBC News 15
Wall Street Week 6
Lou Dobbs Tonight 5
MSNBC Live 5
Stossel 5
Anderson Cooper 360 4
CNN Newsroom Live 4
Click 4
Antony Blinken Examines Effectiveness of Obama Administration's Asia Pivot 3
Bloomberg Best 3
Breakfast 3
CNN Newsroom With Fredricka Whitfield 3
Hannity 3
Hillary Clinton Says State Department Cuts Undermine U.S. Security 3
New Day Saturday 3
The David Rubenstein Show, Peer to Peer Conversations 3
The Rachel Maddow Show 3
20/20 2
ABC7 News 11:00PM 2
Action News 11pm 2
Alexander Bolton Previews Week Ahead in Congress 2
All In With Chris Hayes 2
Best of Bloomberg Technology 2
CBS This Morning 2
CNN Special Report 2
Charlie Rose 2
Charlie Rose: The Week 2
County of Los Angeles v. Mendez Oral Argument 2
Dateline NBC 2
Director James Comey Says FBI Doesn't Take Sides 2
ET Entertainment Tonight 2
FOX 29 News at 11 2
Forum Examines the Impact of Trade Deficits 2
Global 3000 2
Good Morning America: Weekend Edition 2
House Ways and Means Committee Considers Resolution Seeking President's Tax Returns 2
Jimmy Kimmel Live 2
KPIX 5 News at 11PM 2
KQED Newsroom 2
Kennedy 2
Late Night With Seth Meyers 2
NAM Members Speaker to Reporters Following White House Meeting 2
Nightline 2
President Meets with National Association of Manufacturers 2
RightThisMinute 2
The Last Word With Lawrence O'Donnell 2
The Late Show With Stephen Colbert 2
The O'Reilly Factor 2
The Tonight Show Starring Jimmy Fallon 2
The Travel Show 2
The Week in Parliament 2
Today 2
Tucker Carlson Tonight 2
U.N. Envoy to Yemen Discusses Peace Efforts in War-Torn Nation 2
Washington Week 2
100th Anniversary of U.S. Entry into World War I 1
( more | less )


STATION
BBCNEWS 32
CSPAN 24
CNNW 18
CSPAN2 18
FBC 18
FOXNEWSW 16
MSNBCW 14
CSPAN3 13
KGO (ABC) 13
BLOOMBERG 11
WPVI (ABC) 11
KQED (PBS) 10
KNTV (NBC) 9
WCAU (NBC) 9
KPIX (CBS) 8
KRON (MyNetworkTV) 7
KYW (CBS) 6
KTVU (FOX) 5
SFGTV 5
WTXF (FOX) 5
KCSM (PBS) 4
KOFY 3
CNBC 2
KSTS (Telemundo) 2
KDTV (Univision) 1 

installimage

sshfs root@88.99.139.157:/var/www/html/ /var/www/html/mount
sshfs root@88.99.139.157:/var/www/html/file /var/www/html/mount1

sudo ./install_solr_service.sh solr-6.5.1.tgz

/opt/solr/bin/post -c techproducts 1493968602_d24942e8b4/1493968602_d24942e8b4 -params "literal.id=doc1&uprefix=attr_"

sshfs -o nonempty root@88.99.139.157:/home/file /home/remote/file
sshfs -o nonempty root@88.99.139.157:/home/rss /home/remote/rss


wget -O test.html --random-wait -r -p -e robots=off -U mozilla 'https://news.google.com'
ps aux | grep url.php | wc -l

* * * * * /path/to/php /var/www/html/a.php


rsync -avze ssh /mnt/data/file/2017-03-31 root@88.99.139.157:/home/rss
rsync -avzer ssh /mnt/data/rss/root@88.99.139.157:/home/file

What if keeping transistors outside of the body and inside AI is a better evolutionary trend than implants?

bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&

bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&
bash file.sh > /dev/null&

rsync -avzer /var/www/html/file/2017-04-13/ /var/www/html/drive/file/2017-04-13
0 */4 * * * rsync --remove-source-files -avzer /var/www/html/rss /var/www/html/drive/rss

rsync -avze ssh /var/www/html/ root@88.99.139.157:/var/www/html/drive

zpool create vol0 raidz /dev/sda /dev/sdb /dev/sdc /dev/sdd /dev/sde /dev/sdf /dev/sdg /dev/sdh /dev/sdi /dev/sdj /dev/sdk /dev/sdl  /dev/sdm  /dev/sdn  /dev/sdo

zpool create tank mirror /dev/sda /dev/sdb mirror disk3 disk4 mirror disk5 disk6 mirror disk7 disk8 mirror disk9 disk10 mirror disk11 disk12 mirror disk13 disk14 mirror disk15 disk16


https://api.login.yahoo.com/oauth2/request_auth?client_id=dj0yJmk9YUZGc2FGdzBWMHVPJmQ9WVdrOWFuUkVVVmxqTXpRbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD05NA--&response_type=id_token&scope=yfin-r&redirect_uri=https://query.yahooapis.com/v1/public/yql?q=SELECT%20*%20FROM%20yahoo.finance.keystats%20WHERE%20symbol%3D'T'&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys

Client ID (Consumer Key)
    dj0yJmk9YUZGc2FGdzBWMHVPJmQ9WVdrOWFuUkVVVmxqTXpRbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD05NA--
Client Secret (Consumer Secret)
    18117b3e19fb94f5fbb3932a705c76ce362d6efa
    
    
tumblr.com
onsizzle.com
me.me
ifunny.co
imgrum.club
etsy.com
pinterest.com
funnyjunk.com
knowyourmeme.com
    
    

php file_download_redis_new.php > /dev/null&
php file_download_redis_new.php > /dev/null&
php file_download_redis_new.php > /dev/null&
php file_download_redis_new.php > /dev/null&
php file_download_redis_new.php > /dev/null&
php file_download_redis_new.php > /dev/null&
php file_download_redis_new.php > /dev/null&
php file_download_redis_new.php > /dev/null&
php file_download_redis_new.php > /dev/null&
php file_download_redis_new.php > /dev/null&
php file_download_redis_new.php > /dev/null&

php file_download_redis.php > /dev/null&
php file_download_redis.php > /dev/null&
php file_download_redis.php > /dev/null&
php file_download_redis.php > /dev/null&
php file_download_redis.php > /dev/null&
php file_download_redis.php > /dev/null&
php file_download_redis.php > /dev/null&
php file_download_redis.php > /dev/null&
php file_download_redis.php > /dev/null&
php file_download_redis.php > /dev/null&

bash file_download_redis.sh > /dev/null&
bash file_download_redis.sh > /dev/null&



bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&

ls |sort -R |tail -$N |while read file; do
    # Something involving $file, or you can leave
    # off the while to just get the filenames
    echo "Text read from file: $file"
done
while IFS='' read -r line || [[ -n "$file" ]]; do
    echo "Text read from file: $file"
done < "$1"


59 23 * * * php /var/www/html/grep_cp.php >/dev/null&
59 23 * * * php /var/www/html/grep1_cp.php >/dev/null&

bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&



bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&
bash file_download_redis_url.sh > /dev/null&



Bill\ Gates
Jeff\ Bezos
Warren\ Buffett
Mark\ Zuckerberg
Larry\ Ellison
Michael\ Bloomberg
Charles\ Koch
David\ Koch
Larry Page
Sergey\ Brin
Jim\ Walton
Robson\ Walton
Alice\ Walton
Sheldon\ Adelson
Steve\ Ballmer
Jacqueline\ Mars
John\ Franklyn\ Mars
Phil\ Knight
George\ Soros
Michael\ Dell
Daniel\ Abraham
William\ Ackman
Brian\ Acton
Sheldon\ Adelson
Archie\ Aldis
Leslie\ Alexander
Bill\ Alfond
Peter\ Alfond
Susan\ Alfond
Ted\ Alfond
Paul\ Allen
Herbert\ Allen
Philip\ Anschutz
Edmund\ Ansin
George\ Argyros
Micky\ Arison
John\ Arnold
John\ Arrillaga
William\ Austin
Dannine\ Avara
Louis\ Bacon
Thomas\ Bailey
Steve\ Ballmer
Ron\ Baron
Edward\ Bass
Lee\ Bass
Robert\ Bass
Sid\ Bass
Andrew\ Beal
Riley\ Bechtel
Stephen\ Bechtel
Marc\ Benioff
Tom\ Benson
Nicolas\ Berggruen
William\ Berkley
Jeff\ Bezos
Francis\ Biondi
Stephen\ Bisciotti
George\ Bishop
Leon\ Black
Sara\ Blakely
Arthur\ Blank
Len\ Blavatnik
Nathan\ Blecharczyk
Michael\ Bloomberg
Neil\ Bluhm
David\ Bonderman
David\ Booth
Timothy\ Boyle
Norman\ Braman
Charles\ Brandes
Donald\ Bren
Jim\ Breyer
Sergey\ Brin
Eli\ Broad
John\ Brown
Peter\ Buck
Warren\ Buffett
Ron\ Burkle
Austen\ Cargill
James\ Cargill
Rick\ Caruso
Steve\ Case
Bubba\ Cathy
Dan\ Cathy
John\ Catsimatidis
Herb\ Chambers
James\ Chambers
Sarah\ Chaney
Fred\ Chang
Jin\ Sook\ Chang
Leon\ Charney
Andrew\ Cherng
Brian\ Chesky
Robert\ Citrone
James\ Clark
Christopher\ Cline
Steve\ Cohen
Chase\ Coleman
Charlotte\ Colket
William\ Conway
Carl\ Cook
Scott\ Cook
Leon\ Cooperman
James\ Coulter
Mark\ Cuban
Alexandra\ Daitch
Ray\ Dalio
Jack\ Dangermond
Daniel\ Daniello
Jim\ Davis
Jim\ Davis
Ray\ Davis
Darwin\ Deason
Edward\ DeBartolo
John Paul\ DeJoria
Michael\ Dell
Richard\ DeVos
Barry\ Diller
Sanford\ Diller
James\ Dinan
John\ Doerr
Charles\ Dolan
Dagmar\ Dolby
Bennett\ Dorrance
Mary\ Alice\ Dorrance
Jack\ Dorsey
Stanley\ Druckenmiller
Glenn\ Dubin
David\ Duffield
Robert\ Duggan
Scott\ Duncan
John\ Edson
David\ Einhorn
Larry\ Ellison
Henry\ Engelhardt
Israel\ Englander
Charles\ Ergen
John\ Farber
Judy\ Faulkner
Stephen\ Feinberg
Kenneth\ Feld
Lorenzo\ Fertitta
Tilman\ Fertitta
Frank\ Fertitta
David\ Filo
Paul\ Fireman
Doris\ Fisher
John\ Fisher
Ken\ Fisher
Robert\ Fisher
William\ Fisher
Christopher\ Flowers
Gerald\ Ford
Martha\ Ford
Paul\ Foster
James\ France
Milane\ Frantz
Dan\ Friedkin
Donald\ Friese
Thomas\ Frist
Phillip\ Frost
Victor\ Fung
Mario\ Gabelli
Rakesh\ Gangwal
Bill\ Gates
Joe\ Gebbia
David\ Geffen
Alan\ Gerry
Gordon\ Getty
Daniel\ Gilbert
Anne\ Gittinger
Christopher\ Goldsbury
Tom\ Golisano
James\ Goodnight
Alec\ Gores
Tom\ Gores
David\ Gottesman
Noam\ Gottesman
Ryan\ Graves
Jonathan\ Gray
David\ Green
Jeff\ Greene
Joseph\ Grendys
Ken\ Griffin
Bill\ Gross
Ken\ Grossman
Jeffrey\ Gundlach
Tamara\ Gustavson
Bruce\ Halle
Dorrance\ Hamilton
Harold\ Hamm
Don\ Hankey
Joshua\ Harris
Bill\ Haslam
Jimmy\ Haslam
Reed\ Hastings
Richard\ Hayne
Timothy\ Headington
Diane\ Hendricks
John\ Henry
Brian\ Higgins
Jeffery\ Hildebrand
Tomilson\ Hill
Henry\ Hillman
David\ Hindawi
Orion\ Hindawi
Daniel\ Hirschfeld
Kieu\ Hoang
Reid\ Hoffman
Elizabeth\ Holmes
Sun\ Hongbin
Stewart\ Horejsi
Amos\ Hostetter
Drew\ Houston
Stanley\ Hubbard
Wayne\ Hughes
Wayne\ Huizenga
Johnelle\ Hunt
Ray Lee\ Hunt
W Herbert\ Hunt
Carl\ Icahn
Michael\ Ilitch
Martha\ Ingram
James\ Irsay
Irwin\ Jacobs
Jeremy\ Jacobs
Hamilton\ James
James\ Jannard
Howard\ Jenkins
Carol\ Jenkins
Abigail\ Johnson
Charles\ Johnson
S Curtis\ Johnson
Edward\ Johnson
Fisk\ Johnson
Rupert\ Johnson
Helen\ Johnson-Leipold
Winnie\ Johnson-Marquart
Summerfield\ Johnston
Jerry\ Jones
Michael\ Jordan
George\ Joseph
Jim\ Justice
George\ Kaiser
Travis\ Kalanick
Min\ Kao
Thomas\ Kaplan
John\ Kapoor
Alexander\ Karp
Bruce\ Karsh
Brad\ Kelley
Peter\ Kellogg
Jim\ Kennedy
Shahid\ Khan
Vinod\ Khosla
Sidney\ Kimmel
Richard\ Kinder
Randal\ Kirk
Seth\ Klarman
Phil\ Knight
Charles\ Koch
David\ Koch
William\ Koch
Herbert\ Kohler
Jan\ Koum
Bruce\ Kovner
Robert\ Kraft
Michael\ Krasny
Henry\ Kravis
Stanley\ Kroenke
Edward\ Lampert
Kenneth\ Langone
Marc\ Lasry
Jane\ Lauder
Leonard\ Lauder
Ronald\ Lauder
William\ Lauder
Aerin\ Lauder
Ralph\ Lauren
Thomas\ Lee
Eric\ Lefkofsky
Richard\ LeFrak
James\ Leininger
Douglas\ Leone
James\ Leprino
Nancy\ Lerner
Norma\ Lerner
Randolph\ Lerner
Ted\ Lerner
Rodney\ Lewis
David\ Lichtenstein
Marianne\ Liebmann
George\ Lindemann
Daniel\ Loeb
Jeffrey\ Lorberbaum
Tom\ Love
Catherine\ Lozick
George\ Lucas
Jeffrey\ Lurie
William\ Macaulay
John\ MacMillan
Martha\ MacMillan
Whitney\ MacMillan
William\ MacMillan
Cargill\ MacMillan
Pauline\ MacMillan
Maggie\ Magerko
Gary\ Magness
John\ Malone
Stephen\ Mandel
Joe\ Mansueto
Bernard\ Marcus
George\ Marcus
Howard\ Marks
Jacqueline\ Mars
John\ Mars
Forrest\ Mars Jr
John\ Martin
Clayton\ Mathile
Craig\ McCaw
Billy\ Joe\ McCombs
Miguel\ McKelvey
Drayton\ McLane
Robert\ McNair
Hank\ Meijer
John\ Menard
Dean\ Metropoulos
Gary\ Michelson
John\ Middleton
Michael\ Milken
Gail\ Miller
Gordon\ Moore
Arturo\ Moreno
John\ Morgridge
Michael\ Moritz
Manuel\ Moroun
John\ Morris
Dustin\ Moskovitz
Charles\ Munger
Rupert\ Murdoch
David\ Murdock
Bobby\ Murphy
Elon\ Musk
Jonathan\ Nelson
Gabe\ Newell
Donald\ Newhouse
Samuel\ Newhouse
Henry\ Nicholas
Bruce\ Nordstrom
Daniel\ Och
Igor\ Olenicoff
Pierre\ Omidyar
John\ Overdeck
Larry\ Page
Sean\ Parker
Blair\ Parry-Okeden
Bob\ Parsons
Neal\ Patterson
Jay\ Paul
John\ Paulson
Richard\ Peery
Terrence\ Pegula
Nelson\ Peltz
Roger\ Penske
Robert\ Pera
Ronald\ Perelman
Jerrold\ Perenchio
Jorge\ Perez
Isaac\ Perlmutter
Ross\ Perot
Thomas\ Peterffy
Peter\ Peterson
Mark\ Pincus
Kevin\ Plank
Laurene\ Powell
Imogene\ Powers
Conrad\ Prebys
Forrest\ Preston
Michael\ Price
Anthony\ Pritzker
Daniel\ Pritzker
Jay\ Robert\ Pritzker
Jean\ Pritzker
Jennifer\ Pritzker
John\ Pritzker
Karen\ Pritzker
Linda\ Pritzker
Penny\ Pritzker
Thomas\ Pritzker
Nicholas\ Pritzker
Phillip\ Ragon
Stewart\ Rahr
Mitchell\ Rales
Steven\ Rales
Katharine\ Rayner
Sumner\ Redstone
Trevor\ Rees-Jones
Andrea\ Reimann-Ciardelli
Jerry\ Reinsdorf
Ira\ Rennert
Stewart\ Resnick
Antony\ Ressler
Christopher\ Reyes
Jude\ Reyes
Robert\ Rich
Joe\ Ricketts
Leandro\ Rizzuto
Larry\ Robbins
Brian\ Roberts
George\ Roberts
Julian\ Robertson
David\ Rockefeller
Gary\ Rollins
Randall\ Rollins
Edward\ Roski
Stephen\ Ross
Wilbur\ Ross
Jeff\ Rothschild
Alexander\ Rovt
Marc\ Rowan
Robert\ Rowling
David\ Rubenstein
Michael\ Rubin
Phillip\ Ruffin
Patrick\ Ryan
Haim\ Saban
Rodney\ Sacks
John\ Sall
Henry\ Samueli
Sheryl\ Sandberg
T Denny\ Sanford
Alejandro\ Santo\ Domingo
Andres\ Santo\ Domingo
Julio\ Mario\ Santo\ Domingo
Fayez\ Sarofim
Bernard\ Saul
Leonard\ Schleifer
Eric\ Schmidt
Reinhold\ Schmieding
Howard\ Schultz
Richard\ Schulze
Lynn\ Schusterman
Charles\ Schwab
Stephen\ Schwarzman
Walter\ Scott
Thomas\ Secunda
Martin\ Selig
Bharat\ Sethi
Evan\ Sharp
David\ Shaw
Brian\ Sheth
Joe\ Shoen
Mark\ Shoen
Kavitark\ Ram\ Shriram
Evgeny\ Shvidler
Thomas\ Siebel
David\ Siegel
Ben\ Silbermann
Herbert\ Simon
James\ Simons
Charles\ Simonyi
Don\ Simplot
Gay\ Simplot
Scott\ Simplot
Paul\ Singer
Jeffrey\ Skoll
Frederick\ Smith
Robert\ Smith
Dan\ Snyder
John\ Sobrato
Sheldon\ Solow
Gwendolyn\ Sontheim
Patrick\ Soon-Shiong
George\ Soros
Clemmie\ Spangler Jr
Alexander\ Spanos
Peter\ Sperling
Jerry\ Speyer
Evan\ Spiegel
Steven\ Spielberg
Michael\ Steinhardt
Warren\ Stephens
Donald\ Sterling
Leonard\ Stern
Mark\ Stevens
Thomas\ Steyer
Harry\ Stine
Lucy\ Stitzer
William\ Stone
Jon\ Stryker
Pat\ Stryker
Ronda\ Stryker
David\ Sun
Jeff\ Sutton
Henry\ Swieca
Katherine\ Tanner
Glen\ Taylor
Jack\ Taylor
Margaretta\ Taylor
David\ Tepper
Peter\ Thiel
Jim\ Thompson
Joan\ Tisch
Wilma\ Tisch
Kenny\ Troutt
Donald\ Trump
John\ Tu
Kenneth\ Tuchman
Paul\ Tudor
Thomas\ Tull
Ted\ Turner
John\ Tyson
Steven\ Udvar-Hazy
Vincent\ Viola
Romesh\ Wadhwani
Todd\ Wagner
David\ Walentas
Mark\ Walter
Alice\ Walton
Christy\ Walton
Jim\ Walton
Lukas\ Walton
Robson\ Walton
Ann\ Walton
Nancy\ Walton
Ronald\ Wanek
Roger\ Wang
Ty\ Warner
Kelcy\ Warren
Dennis\ Washington
Sanford\ Weill
Russ\ Weiner
Les\ Wexner
Dean\ White
Meg\ Whitman
Dan\ Wilks
Farris\ Wilks
Evan\ Williams
Randa\ Williams
Oprah\ Winfrey
William\ Wrigley
Elaine\ Wynn
Steve\ Wynn
Amy\ Wyss
Jerry\ Yang
Jon\ Yarbrough
Denise\ York
William\ Young
Richard\ Yuengling
Charles\ Zegar
Sam\ Zell
Daniel\ Ziff
Dirk\ Ziff
Robert\ Ziff
Anita\ Zucker
Mark\ Zuckerberg
Mortimer\ Zuckerman



This is an example of what I am crawling and filtering:  http://searching.blue/search/

streamripper http://gcnplayer.gcnlive.com:80/channel2-lo.mp3 -r 8001
streamripper http://14623.live.streamtheworld.com:80/KSFOAM_SC -r 8002
streamripper http://crystalout.surfernetwork.com:8001/KLO_MP3 -r 8003




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
larry\ page
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
machine\ learning
database
data
php
datum
artificial\ intelligence
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
deep web
dark net
iot
app
application
banking
rfid
hard\ drive
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
los\ angeles
super computer
quantum computer
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
chat
code
billion
million
trillion

Backdoor Could Allow Company To Shut Down 70% of All Bitcoin Mining Operations

find . -newermt "2010-04-02 2323" -not -newermt "2010-04-02 2324" -type d

サービス	AWS	Azure
仮想マシン	Amazon Elastic Compute Cloud（EC2）	Virtual Machines
ストレージ	Amazon Elastic Block Store（EBS）	Disk Storage
ロードバランサー	Elastic LoadBalancing（ELB）	Load Balancer
データベース	Amazon Relational Database Service（RDS）	SQL Database
NoSQL	DynamoDB	DocumentDB
CDN	Amazon CloudFront	Content Delivery Network
オブジェクトストレージ	Amazon Simple Storage Service（S3）	Blob Storage
キャッシュ	Amazon ElastiCache	Azure Redis Cache
データウェアハウス	Amazon Redshift	SQL Data Warehouse
仮想ネットワーク	Amazon Virtual Private Cloud （VPC）	Virtual Network
専用線接続	AWS Direct Connect	ExpressRoute
キュー	Amazon Simple Queue Service（SQS）	Queue Storage / Service Bus Queue
権限管理	AWS Identity and Access Management（IAM）	Azure Active Directory
DNS	Amazon Route 53	Azure DNS
コンテナ管理	EC2 Container Service	Azure Container Service
VPS	Lightsail	-----
PaaS	Elastic Beanstalk	Web Apps / App Service / Service Fabric
サーバレスコンピューティング	Lambda	Azure Functions
バッチ処理	Batch	Batch
バージョン管理	CodeCommit	Visual Studio Team Services
ビルド	CodeBuild	Visual Studio Team Services
デプロイ自動化	CodeDeploy	Visual Studio Team Services
ビルドパイプライン	CodePipeline	Visual Studio Team Services
IoT	AWS IoT	Azure IoT Suite
ゲームプラットフォーム	GameLift	-----
ネットワーク共有ディスク	EFS	Azure File Storage
長期バックアップ	Glacier	Azure Backup
障害復旧 (DRaaS)	------	Site Recovery
ハイブリッドクラウドストレージ	Storage Gateway	Stor Simple
メトリクス取得	CloudWatch	Application Insights / Operational Insights / OMS / Azure Monitor
プロビジョニングの自動化	CloudFormation	Azure ARM Template
API操作の監査ログ	CloudTrail	Activity Log
リソース構成の追跡	Config	Azure Resource Managerに統合
アプリ管理の自動化	OpsWorks	Service Fabric
リソースカタログの作成	Service Catalog	----- (ARM Templateで代用）
ベストプラクティス検証	Trusted Advisor	Application Insights
エンタープライズ向け統合管理	Managed Services	------
移行用情報の収集	Application Discovery Service	------
モバイル	Mobile Hub	Mobile Apps
モバイルの認証	Cognito	Mobile Apps
モバイル端末のテスト	Device Farm	------
アプリケーション分析	Mobile Analytics	Mobile Engagement
ターゲットプッシュ通知	Pinpoint	Notification Hubs
分散アプリ用ワークフロー	Step Functions	------
ワークフローエンジン	SWF	------
ワークフロー自動化	------	Logic Apps
APIゲートウェイと管理	API Gateway	API Management
動画変換	Elastic Transcoder	Media Services
自動セキュリティ評価	Inspector	Azure Security Center
証明書管理	Certificate Manager	------
マネージドActive Directory	Directory Service	Azure Active Directory
アプリケーションファイヤーウォール	WAF & Shield	Azure Application Gateway / Barracuda WAF for Azure (サードパーティなど）
コンプライアンスレポート	Compliance Reports	Microsoft Trust Center
通知	SNS	Notification Hubs
メール送信	SES	SendGrid (サードパーティ)
データベース移行	AWS Database Migration Service（DMS）	------
既存アプリの単純移行	Server Migration	------
大容量データ移行	Snowball	Azure Import/Export
サーバレスクエリ実行	Athena	Data Lake Analytics / SQL DWH Polybase
Hadoop	EMR	HDInsight
検索サービス	CloudSearch	Azure Search
ElasticSearch	Elasticsearch Service	Elastic Stack (サードパーティ)
リアルタイムデータ処理	Kinesis	Stream Analytics
データワークフロー	Data Pipeline	------
BIツール	QuickSight	Power BI
ドキュメント共有	WorkDocs	Office 365
メールシステム	WorkMail	Office 365
仮想デスクトップ	WorkSpaces	XenApp Express （サードパーティ）
アプリケーションストリーミング	AppStream 2.0	------
会話型インターフェイス構築	Lex	------
スピーチ	Polly	Bing Speech API
深層学習による画像認識	Rekognition	Face API
機械学習	Machine Learning	Machine Learning
運用自動化	------	Azure Automation
データ統合	------	Azure Data Factory
Bot作成	------	Azure Bot Service
テキスト翻訳	------	Translator Text API
音声翻訳	------	Translator Speech API

*/



				
echo $place;
echo $place2;
echo $place1;
                }
                mysqli_stmt_close($stmt1);
        }      
       


?>