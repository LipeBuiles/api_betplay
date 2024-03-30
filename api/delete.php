<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/BaseMySQL.php';
include_once '../models/Poker.php';

$baseDatos = new Basemysql();
$db = $baseDatos->connect();

$poker = new Poker($db);

$data = json_decode(file_get_contents("php://input"));

$poker->ID = $data->ID;

if ($poker->delete()){
    echo json_encode(
        array('message' => 'Registro borrada')
    );
}else{
    echo json_encode(
        array('message' => 'Registro NO borrada')
    );
}
