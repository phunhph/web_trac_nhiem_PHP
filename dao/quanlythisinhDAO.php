<?php
require_once 'models/HocVienModel.php';
class QuanlyThiSinhDAO
{
    private $db;
    public function __construct()
    {
        $dbConnection = new DatabaseConnection();
        $this->db = $dbConnection->getConnection();
    }

    public function getPhong($makythi)
    {
        $query = "SELECT DISTINCT tenphongthi FROM hocvien WHERE makythi = :makythi";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':makythi', $makythi, PDO::PARAM_STR);
        $stmt->execute();

        $phongs = array();

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $phongs[] = $row->tenphongthi;
        }

        return $phongs;
    }

    public function getThiSinh($makythi, $tenphong)
    {
        $query = "SELECT HOCVIEN.sbd, HOCVIEN.hodem, HOCVIEN.ten, HOCVIEN.ngaysinh, HOCVIEN.noisinh, HOCVIEN.madonvi, DONVI.tendonvi, HOCVIEN.tenphongthi
              FROM HOCVIEN
              INNER JOIN DONVI ON HOCVIEN.madonvi = DONVI.madonvi
              WHERE HOCVIEN.makythi = :makythi AND HOCVIEN.tenphongthi = :tenphong";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':makythi', $makythi, PDO::PARAM_STR);
        $stmt->bindParam(':tenphong', $tenphong, PDO::PARAM_STR);
        $stmt->execute();
        $hocviens = array();

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $hocvien = new HocVien(
                $row->sbd,
                $row->hodem,
                $row->ten,
                $row->ngaysinh,
                $row->ngaysinh,
                $row->noisinh,
                $row->madonvi,
                $row->tendonvi,
                $row->tenphongthi,
                null,
                null
            );
            $hocviens[] = $hocvien;
        }

        return $hocviens;
    }


    public function createThiSinh($sbd, $hodem, $ten, $ngaysinh, $noisinh, $makythi, $madonvi, $tenphongthi, $matkhau, $profile)
    {
    }
    public function updateThiSinh($sbd, $hodem, $ten, $ngaysinh, $noisinh, $makythi, $madonvi, $tenphongthi, $matkhau, $profile)
    {
    }
    public function deleteThiSinh($sbd)
    {
    }
}
