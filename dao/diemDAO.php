<?php
require_once 'models/HocVienModel.php';
class DiemDAO
{
    private $db;
    public function __construct()
    {
        $dbConnection = new DatabaseConnection();
        $this->db = $dbConnection->getConnection();
    }
    public function getall($tenphong, $kythi)
    {
        $query = "SELECT hocvien.sbd AS sbd, 
        hocvien.hodem AS hodem, 
        hocvien.ten AS ten, 
        hocvien.noisinh AS noisinh, 
        hocvien.ngaysinh AS ngaysinh, 
        diem.mamodun AS mamodun, 
        diem.socaudung, 
        diem.diem,
        diem.thoigianthi, 
        diem.thoigianketthuc, 
        modun.tenmodun AS tenmodun 
        FROM hocvien 
        INNER JOIN kythi ON kythi.makythi = hocvien.makythi 
        LEFT JOIN diem ON diem.sbd = hocvien.sbd 
        LEFT JOIN modun ON modun.mamodun = diem.mamodun 
        WHERE kythi.makythi = :kythi AND hocvien.tenphongthi = :tenphong
        ORDER BY hocvien.sbd";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tenphong', $tenphong);
        $stmt->bindParam(':kythi', $kythi);
        $stmt->execute();

        $moduns = array();

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $moduns[] = $row;
        }

        return $moduns;
    }
}
