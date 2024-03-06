<?php

class DatabaseConnection
{
    private $host = 'localhost:3306';
    private $dbname = 'bee97534_thi_tin_hoc';
    private $username = 'bee97534_admin';
    private $password = 'ph#241Es1';
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
// <?php

// class DatabaseConnection
// {
//     private $host = 'localhost:3306';
//     private $dbname = 'bee97534_thi_tin_hoc';
//     private $username = 'bee97534_admin';
//     private $password = 'ph#241Es1';
//     private $conn;

//     public function __construct()
//     {
//         try {
//             $this->conn = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
//             $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
//         } catch (\PDOException $e) {
//             echo "Connection failed: " . $e->getMessage();
//         }
//     }

//     public function getConnection()
//     {
//         return $this->conn;
//     }
// }