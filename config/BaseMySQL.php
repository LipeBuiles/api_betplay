<?php

class Basemysql
{
    private $dotenv;
    private $db_host;
    private $db_name;
    private $username;
    private $password;

    private $conn;

    public function __construct()
    {
        $this->dotenv = parse_ini_file('.env');
        $this->db_host = $this->dotenv['DB_HOST'];
        $this->db_name = $this->dotenv['DB_NAME'];
        $this->username = $this->dotenv['DB_USERNAME'];
        $this->password = $this->dotenv['DB_PASSWORD'];
    }

    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }

        return $this->conn;
    }
}
