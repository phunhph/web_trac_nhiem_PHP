<?php

class DatabaseConnection
{
    // private $host = 'localhost:3306';
    // private $dbname = 'bee97534_thi_tin_hoc';
    // private $username = 'bee97534_admin';
    // private $password = 'ph#241Es1';

    private $host = 'localhost';
    private $dbname = 'thi_tin_hoc';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new \PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4", $this->username, $this->password);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Kết nối không thành công: " . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
