<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/BaseMySQL.php';
include_once '../models/Poker.php';

$baseDatos = new Basemysql();
$db = $baseDatos->connect();

$poker = new Poker($db);

$data = json_decode(file_get_contents("php://input"));

$poker->Date = $data->Date;
$poker->Initial_Value = $data->Initial_Value;
$poker->Final_Value = $data->Final_Value;
$poker->Increment = $data->Increment;
$poker->Cumulative_Increase = $data->Cumulative_Increase;
$poker->Initial_Time = $data->Initial_Time;
$poker->Final_Time = $data->Final_Time;
$poker->Time_In_Hours = $data->Time_In_Hours;
$poker->Numbers_Hands = $data->Numbers_Hands;
$poker->Cumulative_Numbers_Hands = $data->Cumulative_Numbers_Hands;
$poker->VBB = $data->VBB;
$poker->bb100 = $data->bb100;
$poker->Scale = $data->Scale;
$poker->Cumulative_bb100 = $data->Cumulative_bb100;
$poker->Cumulative_Scale = $data->Cumulative_Scale;

if ($poker->create()){
    echo json_encode(
        array('message' => 'Registro creado')
    );
}else{
    echo json_encode(
        array('message' => 'Registro NO creado')
    );
}
