<?php

function db_connect_scraper_100()
{
   $result = new mysqli('localhost', 'root', '3h4xb0011011001tCiK', 'scraper'); 
   if (!$result)
     throw new Exception('Could not connect to database server');
   else
     return $result;
}
function db_connect_100()
{
   $result = new mysqli('localhost', 'root', '3h4xb0011011001tCiK', 'docunator'); 
   if (!$result) 
     throw new Exception('Could not connect to database server');
   else
     return $result;
}

function db_connect_domain()
{
   $result = new mysqli('localhost', 'root', '3h4xb0011011001tCiK', 'domain'); 
   if (!$result) 
     throw new Exception('Could not connect to database server');
   else
     return $result;
}

?>
