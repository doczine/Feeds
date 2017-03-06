#/usr/bin/php
while :; do
sleep .3
      php -f searchindex.php > /dev/null&
done
