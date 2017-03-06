<?php
/*
include('db.php');
$conn = db_connect_domain();
$master = '';
$query = "SELECT `master` FROM `domain`.`master` ORDER BY RAND() LIMIT 1;";
if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $master);
    while (mysqli_stmt_fetch($stmt)) {
		echo $master;
    }
    mysqli_stmt_close($stmt);
}
*/
//$one = $_GET['one'];
//$two = $_GET['two'];
//$three = $_GET['three'];

$rand = rand(1,44);
$rand1 = rand(1,44);
$rand2 = rand(1,44);

$word = "cup,arm,cat,met,away,turn,hit,see,hot,call,put,blue,five,now,say,go,boy,where,near,pure,bad,did,find,give,how,yes,cat,leg,man,no,sing,pet,red,sun,she,tea,check,think,this,voice,wet,zoo,pleasure,just";
//$word = "afternoon,factory,allergy,volunteer,history,already,difficult,minimum,telescope,slippery,memorize,underline,battery,possibly,happiness,butterfly,happily,personal,comedy,injury,organic,container,wilderness,operate,crocodile,decorate,majesty,gravity,multiply,barbecue,basketball,magnify,several,calendar,sincerely,vacation,substitute,umbrella,obvious,qualify,vanilla,sensation,president,library,solution,passenger,officer,accident,sacrifice,overdue,quotation,concentrate,porcupine,paragraph,difference,volcano,sensible,exercise,stadium,suspicion,however,scientist,general,inventor,remember,wherever,celery,imagine,manager,triangle,professor,vibration,volleyball,location,mistletoe,yesterday,rectangle,instantly,together,violin,national,surgery,dangerous,important,sorcerer,position,canary,messenger,detective,cardinal";
//$word = "purple,protest,duckling,sleepy,safety,liquid,orbit,season,proving,flower,trainer,funnel,baseball,minus,unit,current,dozen,retreat,greater,custard,mammal,lonely,mayor,figure,planet,pavement,double,survive,percent,expand,eclipse,bridges,chuckled,sidewalk,insect,compass,slightest,radar,system,pollen,escape,symbol,pupil,earthworm,convex,matching,disease,extinct,easy,central,cancer,crackle,stitches,factor,amount,measure,larva,sequence,treatment,primate,fossil,salad,fraction,hundred,concert,muscle,awful,account,crystal,revolve,fewer,cyclone,immune,reptile,instinct,subtract,connect,friction,dissolve,complete,glacier,control,humid,motion,product,voyage,fungus,kidney,success,thousand";

$delimiter=',';
$itemList = explode($delimiter, $word);
//print_r($itemList);

$one = $itemList[$rand];
$two = $itemList[$rand1];
$three = $itemList[$rand2];

$master = $one;
$rhyme = "rhyme ".$master;
exec($rhyme, $results);
//print_r($results);
$paste = '';
foreach ($results as &$value) {
    $paste .= $value;
}
$results = $paste;
$results = str_replace("Finding perfect rhymes for test...", ",", $results);
$results = str_replace("Finding", ",", $results);
$results = str_replace("perfect", ",", $results);
$results = str_replace("rhymes", ",", $results);
$results = str_replace(" for ", ",", $results);
$results = str_replace("(2)", ",", $results);
$results = str_replace("...", ",", $results);
$results = str_replace("
", ",", $results);
$results = str_replace("1: ", ",", $results);
$results = str_replace("2: ", ",", $results);
$results = str_replace("3: ", ",", $results);
$results = str_replace("4: ", ",", $results);
$results = str_replace("5: ", ",", $results);
$results = str_replace(" ", ",", $results);
$results = str_replace(",,", ",", $results);
$results = str_replace(",,", ",", $results);
$total = explode(',', $results);
$total1 = array_filter($total);

$master = $two;
$rhyme = "rhyme ".$master;
exec($rhyme, $results);
//print_r($results);
$paste = '';
foreach ($results as &$value) {
    $paste .= $value;
}
$results = $paste;
$results = str_replace("Finding perfect rhymes for test...", ",", $results);
$results = str_replace("Finding", ",", $results);
$results = str_replace("perfect", ",", $results);
$results = str_replace("rhymes", ",", $results);
$results = str_replace(" for ", ",", $results);
$results = str_replace("(2)", ",", $results);
$results = str_replace("...", ",", $results);
$results = str_replace("
", ",", $results);
$results = str_replace("1: ", ",", $results);
$results = str_replace("2: ", ",", $results);
$results = str_replace("3: ", ",", $results);
$results = str_replace("4: ", ",", $results);
$results = str_replace("5: ", ",", $results);
$results = str_replace(" ", ",", $results);
$results = str_replace(",,", ",", $results);
$results = str_replace(",,", ",", $results);
$total = explode(',', $results);
$total2 = array_filter($total);

$master = $three;
$rhyme = "rhyme ".$master;
exec($rhyme, $results);
//print_r($results);
$paste = '';
foreach ($results as &$value) {
    $paste .= $value;
}
$results = $paste;
$results = str_replace("Finding perfect rhymes for test...", ",", $results);
$results = str_replace("Finding", ",", $results);
$results = str_replace("perfect", ",", $results);
$results = str_replace("rhymes", ",", $results);
$results = str_replace(" for ", ",", $results);
$results = str_replace("(2)", ",", $results);
$results = str_replace("...", ",", $results);
$results = str_replace("
", ",", $results);
$results = str_replace("1: ", ",", $results);
$results = str_replace("2: ", ",", $results);
$results = str_replace("3: ", ",", $results);
$results = str_replace("4: ", ",", $results);
$results = str_replace("5: ", ",", $results);
$results = str_replace(" ", ",", $results);
$results = str_replace(",,", ",", $results);
$results = str_replace(",,", ",", $results);
$total = explode(',', $results);
$total3 = array_filter($total);


$count = count($total1)-1;
$count1 = count($total2)-1;
$count2 = count($total3)-1;
$rand = rand(0, $count);
$rand1 = rand(0, $count1);
$rand2 = rand(0, $count2);
$max = max($count, $count1, $count2);
$max = $max - 1;
$i = 0;
do {
$i++;
$rand = rand(0, $count);
$rand1 = rand(0, $count1);
$rand2 = rand(0, $count2);
echo $total1[$rand]." ";
echo $total2[$rand1]." ";
echo $total3[$rand2]." 
<br>";
} while ($i < $max);


//echo $count;
//echo $total[$rand];
//print_r($total);



?>
