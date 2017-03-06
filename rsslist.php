<html>
<head>
<style>
      tr:nth-of-type(odd) {
      background-color:#F0FFFF;
    }
      tr:nth-of-type(even) {
      background-color:#87CEFA;
    }
</style>
</head>
<body>
<form action="searchword.php" style="width:100%;">
  Search:<input type="text" name="search" value="search">    
<?php
if(isset($_GET['date'])){
$today = strip_tags(stripslashes($_GET['date']));
}
else
{
 $today = date('Y-m-d');
}
   
echo "<input type='text' name='date' value='".$today."'>";
?>
  <input type="submit" value="Submit">
</form><br>
<table class="alternate_color">
<?php
include('db.php');
$conn = db_connect_scraper_100();
$conn1 = db_connect_100();

$search = "";



if(isset($_GET['search'])){
$search = strip_tags(stripslashes($_GET['search']));
}

if(isset($_GET['date'])){
$today = strip_tags(stripslashes($_GET['date']));
}
else
{
 $today = date('Y-m-d');
}
        $query1 = "SELECT `title`, `url`, `key_url`, `date` FROM `scraper`.`feed` WHERE `feed`.`title` LIKE '%".$search."%' AND `feed`.`date` = '".$today."';";

        if ($stmt1 = mysqli_prepare($conn1, $query1)) {
                        mysqli_stmt_execute($stmt1);
                mysqli_stmt_bind_result($stmt1, $title, $fetch, $key, $date);
                while (mysqli_stmt_fetch($stmt1)) {

echo "<tr><td>".$title."</td>";
echo "<td><a href='".$fetch."'>a</a></td>";
echo "<td><a href='".$key."'>".$key."</a></td></tr>
";
                }
                mysqli_stmt_close($stmt1);
        }      
       


?>
</table>
</body>
</html>
