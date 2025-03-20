<?php

class Database
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "oppsdatabase";
    private $conn;


    public function connect()
    {
        try
        {
            $this->conn = new PDO("mysql:host=".$this->hostname.";dbname=".$this->database,$this->username,$this->password);
            return $this->conn;
        }
        catch(PDOException $e)
        {
            echo "Error : " . $e->getMessage();
        }
    }
}