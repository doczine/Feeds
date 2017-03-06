#/usr/bin/php
while :; do
	php -f solr_html_1.php > /dev/null&
	php -f solr_html_2.php > /dev/null&
	php -f solr_html_3.php > /dev/null&
	php -f solr_html_4.php > /dev/null&
sleep 3
done
