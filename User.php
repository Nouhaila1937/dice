<?php
class Database
{
    private $host = "127.0.0.1";
    private $user = "root";
    private $password = " ";
    private $dbname = "gi_dd";

    public function connect()
    {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
}
class User{
private $conn;
private $table;  

public function __construct()
{
    $this->table = "users";
    $db = new database();
    $this->conn = $db->connect();
}

}
 ?>