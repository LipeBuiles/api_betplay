<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/BaseMySQL.php';
include_once '../models/Poker.php';

$baseDatos = new Basemysql();
$db = $baseDatos->connect();

$poker = new Poker($db);
$poker->ID = isset($_GET['ID']) ? $_GET['ID'] : die();
$poker->read_individual();

$poker_array = array(
    'ID' => $poker->ID,
    'Date' => $poker->Date,
    'Initial_Value' => $poker->Initial_Value,
    'Final_Value' => $poker->Final_Value,
    'Increment' => $poker->Increment,
    'Cumulative_Increase' => $poker->Cumulative_Increase,
    'Initial_Time' => $poker->Initial_Time,
    'Final_Time' => $poker->Final_Time,
    'Time_In_Hours' => $poker->Time_In_Hours,
    'Numbers_Hands' => $poker->Numbers_Hands,
    'Cumulative_Numbers_Hands' => $poker->Cumulative_Numbers_Hands,
    'VBB' => $poker->VBB,
    'bb100' => $poker->bb100,
    'Scale' => $poker->Scale,
    'Cumulative_bb100' => $poker->Cumulative_bb100,
    'Cumulative_Scale' => $poker->Cumulative_Scale
);


print_r(json_encode($poker_array));
