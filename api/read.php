<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/BaseMySQL.php';
include_once '../models/Poker.php';

$baseDatos = new Basemysql();
$db = $baseDatos->connect();

$poker = new Poker($db);
$result = $poker->read();

$num = $result->rowCount();

if($num > 0){
    $poker_array = array();
    $poker_array['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $poker_item = array(
            'ID' => $ID,
            'Date' => $Date,
            'Initial_Value' => $Initial_Value,
            'Final_Value' => $Final_Value,
            'Increment' => $Increment,
            'Cumulative_Increase' => $Cumulative_Increase,
            'Initial_Time' => $Initial_Time,
            'Final_Time' => $Final_Time,
            'Time_In_Hours' => $Time_In_Hours,
            'Numbers_Hands' => $Numbers_Hands,
            'Cumulative_Numbers_Hands' => $Cumulative_Numbers_Hands,
            'VBB' => $VBB,
            'bb100' => $bb100,
            'Scale' => $Scale,
            'Cumulative_bb100' => $Cumulative_bb100,
            'Cumulative_Scale' => $Cumulative_Scale
        );

        array_push($poker_array['data'], $poker_item);
    }
 
    echo json_encode($poker_array);

}else{
    echo json_encode(array('message' => 'No hay registros'));
}
