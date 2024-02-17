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
}
