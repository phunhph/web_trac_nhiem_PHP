<?php
require_once 'models/KyThiModels.php';
class AdminDAO
{
    private $db;
    public function __construct()
    {
        $dbConnection = new DatabaseConnection();
        $this->db = $dbConnection->getConnection();
    }
    public function getKythi()
    {
        $query = "SELECT makythi, tenkythi, tgbatdau, tgketthuc FROM kythi";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $kythis = array(); // Giả sử bạn muốn trả về một mảng các đối tượng KyThi

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            // Tạo một đối tượng KyThi và thêm vào mảng
            $kythi = new KyThi($row->makythi, $row->tenkythi, $row->tgbatdau, $row->tgketthuc);
            $kythis[] = $kythi;
        }

        return $kythis;
    }
    public function updateKyThi($makythi, $tgbatdau, $tgketthuc)
    {
        try {
            $query = "UPDATE `kythi` SET `tgbatdau`=:tgbatdau, `tgketthuc`=:tgketthuc WHERE `makythi`=:makythi";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':makythi', $makythi);
            $stmt->bindParam(':tgbatdau', $tgbatdau);
            $stmt->bindParam(':tgketthuc', $tgketthuc);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function createKyThi($makythi, $tenkythi, $tgbatdau, $tgketthuc)
    {
        try {
            $query = "INSERT INTO `kythi`(`makythi`, `tenkythi`, `tgbatdau`, `tgketthuc`) VALUES (:makythi, :tenkythi, :tgbatdau, :tgketthuc)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':makythi', $makythi, PDO::PARAM_STR);
            $stmt->bindParam(':tenkythi', $tenkythi, PDO::PARAM_STR);
            $stmt->bindParam(':tgbatdau', $tgbatdau, PDO::PARAM_STR); // or PDO::PARAM_INT
            $stmt->bindParam(':tgketthuc', $tgketthuc, PDO::PARAM_STR); // or PDO::PARAM_INT
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function deleteKyThi($makythi)
    {
        try {
            $query = "DELETE FROM `kythi` WHERE `makythi`=:makythi";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':makythi', $makythi, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getNameKyThi()
    {
        $query = "SELECT makythi, tenkythi FROM kythi";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $kythis = array(); // Giả sử bạn muốn trả về một mảng các đối tượng KyThi

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            // Tạo một đối tượng KyThi và thêm vào mảng
            $kythi = new KyThi($row->makythi, $row->tenkythi, null, null);
            $kythis[] = $kythi;
        }

        return $kythis;
    }
}
