#/usr/bin/php
while :; do
	php -f solr_reindex.php > /dev/null&
sleep 1
done
