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
if(isset($_GET['date1'])){
$today1 = strip_tags(stripslashes($_GET['date1']));
}
else
{
 $today1 = date('Y-m-d');
}

        $query1 = "SELECT `title`, `url`, `key_url`, `date` FROM `scraper`.`feed` WHERE `feed`.`date` BETWEEN CAST('".$today1."' AS DATE) AND CAST('".$today."' AS DATE) AND `feed`.`title` LIKE '%".$search."%';";

        if ($stmt1 = mysqli_prepare($conn1, $query1)) {
                        mysqli_stmt_execute($stmt1);
                mysqli_stmt_bind_result($stmt1, $title, $fetch, $key, $date);
                while (mysqli_stmt_fetch($stmt1)) {

echo "<tr><td>".$title."</td>";
echo "<td><a href='".$fetch."'>a</a></td>";
echo "<td><a href='".$key."'>a</a></td></tr>
";
                }
                mysqli_stmt_close($stmt1);
        }      
       


?>
</table>
</body>
</html>
