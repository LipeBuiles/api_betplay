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

    public function create()
    {
        $query = 'INSERT INTO ' . $this->table . ' (Date, Initial_Value, Final_Value, Increment, Cumulative_Increase, Initial_Time, Final_Time, Time_In_Hours, Numbers_Hands, Cumulative_Numbers_Hands, VBB, bb100, Scale, Cumulative_bb100, Cumulative_Scale) VALUES (:Date, :Initial_Value, :Final_Value, :Increment, :Cumulative_Increase, :Initial_Time, :Final_Time, :Time_In_Hours, :Numbers_Hands, :Cumulative_Numbers_Hands, :VBB, :bb100, :Scale, :Cumulative_bb100,:Cumulative_Scale)';
        $stmt = $this->conn->prepare($query);

        $this->Date = htmlspecialchars(strip_tags($this->Date));
        $this->Initial_Value = htmlspecialchars(strip_tags($this->Initial_Value));
        $this->Final_Value = htmlspecialchars(strip_tags($this->Final_Value));
        $this->Increment = htmlspecialchars(strip_tags($this->Increment));
        $this->Cumulative_Increase = htmlspecialchars(strip_tags($this->Cumulative_Increase));
        $this->Initial_Time = htmlspecialchars(strip_tags($this->Initial_Time));
        $this->Final_Time = htmlspecialchars(strip_tags($this->Final_Time));
        $this->Time_In_Hours = htmlspecialchars(strip_tags($this->Time_In_Hours));
        $this->Numbers_Hands = htmlspecialchars(strip_tags($this->Numbers_Hands));
        $this->Cumulative_Numbers_Hands = htmlspecialchars(strip_tags($this->Cumulative_Numbers_Hands));
        $this->VBB = htmlspecialchars(strip_tags($this->VBB));
        $this->bb100 = htmlspecialchars(strip_tags($this->bb100));
        $this->Scale = htmlspecialchars(strip_tags($this->Scale));
        $this->Cumulative_bb100 = htmlspecialchars(strip_tags($this->Cumulative_bb100));
        $this->Cumulative_Scale = htmlspecialchars(strip_tags($this->Cumulative_Scale));

        $stmt->bindParam(":Date", $this->Date);
        $stmt->bindParam(":Initial_Value", $this->Initial_Value);
        $stmt->bindParam(":Final_Value", $this->Final_Value);
        $stmt->bindParam(":Increment", $this->Increment);
        $stmt->bindParam(":Cumulative_Increase", $this->Cumulative_Increase);
        $stmt->bindParam(":Initial_Time", $this->Initial_Time);
        $stmt->bindParam(":Final_Time", $this->Final_Time);
        $stmt->bindParam(":Time_In_Hours", $this->Time_In_Hours);
        $stmt->bindParam(":Numbers_Hands", $this->Numbers_Hands);
        $stmt->bindParam(":Cumulative_Numbers_Hands", $this->Cumulative_Numbers_Hands);
        $stmt->bindParam(":VBB", $this->VBB);
        $stmt->bindParam(":bb100", $this->bb100);
        $stmt->bindParam(":Scale", $this->Scale);
        $stmt->bindParam(":Cumulative_bb100", $this->Cumulative_bb100);
        $stmt->bindParam(":Cumulative_Scale", $this->Cumulative_Scale);

        if ($stmt->execute()) {
            return true;
        };
        printf("Error $stmt\n, $stmt->error");
        return false;
    }

    public function update()
    {
        $query = 'UPDATE ' . $this->table . ' SET Date = :Date, Initial_Value = :Initial_Value, Final_Value = :Final_Value, Increment = :Increment, Cumulative_Increase = :Cumulative_Increase, Initial_Time = :Initial_Time, Final_Time = :Final_Time, Time_In_Hours = :Time_In_Hours, Numbers_Hands = :Numbers_Hands, Cumulative_Numbers_Hands = :Cumulative_Numbers_Hands, VBB = :VBB, bb100 = :bb100, Scale = :Scale, Cumulative_bb100 = :Cumulative_bb100, Cumulative_Scale = :Cumulative_Scale WHERE ID = :ID';
        $stmt = $this->conn->prepare($query);

        $this->Date = htmlspecialchars(strip_tags($this->Date));
        $this->Initial_Value = htmlspecialchars(strip_tags($this->Initial_Value));
        $this->Final_Value = htmlspecialchars(strip_tags($this->Final_Value));
        $this->Increment = htmlspecialchars(strip_tags($this->Increment));
        $this->Cumulative_Increase = htmlspecialchars(strip_tags($this->Cumulative_Increase));
        $this->Initial_Time = htmlspecialchars(strip_tags($this->Initial_Time));
        $this->Final_Time = htmlspecialchars(strip_tags($this->Final_Time));
        $this->Time_In_Hours = htmlspecialchars(strip_tags($this->Time_In_Hours));
        $this->Numbers_Hands = htmlspecialchars(strip_tags($this->Numbers_Hands));
        $this->Cumulative_Numbers_Hands = htmlspecialchars(strip_tags($this->Cumulative_Numbers_Hands));
        $this->VBB = htmlspecialchars(strip_tags($this->VBB));
        $this->bb100 = htmlspecialchars(strip_tags($this->bb100));
        $this->Scale = htmlspecialchars(strip_tags($this->Scale));
        $this->Cumulative_bb100 = htmlspecialchars(strip_tags($this->Cumulative_bb100));
        $this->Cumulative_Scale = htmlspecialchars(strip_tags($this->Cumulative_Scale));
        $this->ID = htmlspecialchars(strip_tags($this->ID));


        $stmt->bindParam(":Date", $this->Date);
        $stmt->bindParam(":Initial_Value", $this->Initial_Value);
        $stmt->bindParam(":Final_Value", $this->Final_Value);
        $stmt->bindParam(":Increment", $this->Increment);
        $stmt->bindParam(":Cumulative_Increase", $this->Cumulative_Increase);
        $stmt->bindParam(":Initial_Time", $this->Initial_Time);
        $stmt->bindParam(":Final_Time", $this->Final_Time);
        $stmt->bindParam(":Time_In_Hours", $this->Time_In_Hours);
        $stmt->bindParam(":Numbers_Hands", $this->Numbers_Hands);
        $stmt->bindParam(":Cumulative_Numbers_Hands", $this->Cumulative_Numbers_Hands);
        $stmt->bindParam(":VBB", $this->VBB);
        $stmt->bindParam(":bb100", $this->bb100);
        $stmt->bindParam(":Scale", $this->Scale);
        $stmt->bindParam(":Cumulative_bb100", $this->Cumulative_bb100);
        $stmt->bindParam(":Cumulative_Scale", $this->Cumulative_Scale);
        $stmt->bindParam(":ID", $this->ID);

        if ($stmt->execute()) {
            return true;
        };
        printf("Error $stmt\n, $stmt->error");
        return false;
    }

    public function delete()
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE ID = :ID';
        $stmt = $this->conn->prepare($query);

        $this->ID = htmlspecialchars(strip_tags($this->ID));

        $stmt->bindParam(":ID", $this->ID);

        if ($stmt->execute()) {
            return true;
        };
        printf("Error $stmt\n, $stmt->error");
        return false;
    }
}
