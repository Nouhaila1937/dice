<?php

class Database
{
    public $host = "localhost";
    public $user = "root";
    public $password = " ";
    public $dbname = "gi_dd";

    public function connect()
    {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
           echo $this->host; return $conn;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
}
?>