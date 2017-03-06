#/usr/bin/php
while :; do
       (php -f warcdownload.php > /dev/null&)
sleep 600
done
