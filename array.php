

<?php
// Voorbeeld: multidimensional array
$array = array(
    array(
        'MachineStatus' => '1'
    ),
    array(
        'MachineStatus' => '0'
    ),
    array(
        'MachineStatus' => '1'
    ),
    array(
        'MachineStatus' => '0'
    )
);
 
// Var dump
echo '<pre>';
var_dump($array);
echo '</pre>';
 
// Array
$waardeNulOfEen = array();
 
for ($i = 0; $i < count($array); $i++) {
    $waardeNulOfEen[] = $array[$i]['MachineStatus'];
}
 
$jsonWaardeNulOfEen = json_encode($waardeNulOfEen);
 
// json formaat
echo $jsonWaardeNulOfEen;

?>
