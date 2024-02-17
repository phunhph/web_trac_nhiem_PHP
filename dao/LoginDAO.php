<?php


require_once 'config.php';
require_once 'models/LoginModel.php';

class LoginDAO
{
    private $db;
    public function __construct()
    {
        $dbConnection = new DatabaseConnection();
        $this->db = $dbConnection->getConnection();
    }
    public function login($username, $password)
    {
        $password = md5($password);

        $query = "SELECT hocvien.sbd, hocvien.hodem, hocvien.ten, hocvien.ngaysinh, hocvien.noisinh, hocvien.madonvi, kythi.tgbatdau, kythi.tgketthuc
                  FROM hocvien
                  JOIN kythi ON kythi.makythi = hocvien.makythi
                  WHERE sbd = :sbd AND matkhau = :password";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':sbd', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $user = null;

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            // Create a Login object and add it to the array
            $user = new Login(
                $row->sbd,
                $row->hodem,
                $row->ten,
                $row->ngaysinh,
                $row->noisinh,
                $row->madonvi,
                $row->tgbatdau,
                $row->tgketthuc
            );
        }

        return $user;
    }
    public function loginAdmin($tk, $mk)
    {
        $password = $mk;

        $query = "SELECT maadmin, matkhau FROM admin WHERE maadmin=:tk AND matkhau=:password";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tk', $tk);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $user = null;

        if ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            // Assigning values to $user
            $user = array(
                'maadmin' => $row['maadmin'],
                'matkhau' => $row['matkhau']
            );
        }

        return $user;
    }
}
