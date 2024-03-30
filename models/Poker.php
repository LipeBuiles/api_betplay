<?php

class Poker
{
    private $conn;
    private $table = 'tbl_betplay_poker';

    public $ID;
    public $Date;
    public $Initial_Value;
    public $Final_Value;
    public $Increment;
    public $Cumulative_Increase;
    public $Initial_Time;
    public $Final_Time;
    public $Time_In_Hours;
    public $Numbers_Hands;
    public $Cumulative_Numbers_Hands;
    public $VBB;
    public $bb100;
    public $Scale;
    public $Cumulative_bb100;
    public $Cumulative_Scale;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY ID ASC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function read_individual()
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE ID = ? LIMIT 0,1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->ID);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->ID = $row['ID'];
        $this->Date = $row['Date'];
        $this->Initial_Value = $row['Initial_Value'];
        $this->Final_Value = $row['Final_Value'];
        $this->Increment = $row['Increment'];
        $this->Cumulative_Increase = $row['Cumulative_Increase'];
        $this->Initial_Time = $row['Initial_Time'];
        $this->Final_Time = $row['Final_Time'];
        $this->Time_In_Hours = $row['Time_In_Hours'];
        $this->Numbers_Hands = $row['Numbers_Hands'];
        $this->Cumulative_Numbers_Hands = $row['Cumulative_Numbers_Hands'];
        $this->VBB = $row['VBB'];
        $this->bb100 = $row['bb100'];
        $this->Scale = $row['Scale'];
        $this->Cumulative_bb100 = $row['Cumulative_bb100'];
        $this->Cumulative_Scale = $row['Cumulative_Scale'];
    }
}
