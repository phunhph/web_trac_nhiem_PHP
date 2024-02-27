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
                $row->noisinh,
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
    // get ma don vi
    public function getMaDonVi($madonvi)
    {
        $sql = "SELECT madonvi, tendonvi FROM DONVI WHERE madonvi = :madonvi";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':madonvi', $madonvi);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    public function createMaDonVi($madonvi, $tendonvi)
    {
        $sql = "INSERT INTO `donvi`(`madonvi`, `tendonvi`) VALUES (:madonvi, :tendonvi)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':madonvi', $madonvi);
        $stmt->bindParam(':tendonvi', $tendonvi);
        $stmt->execute();
    }

    public function getThiSinhById($thiSinhId)
    {
        $result = null;
        $sql = "SELECT * FROM `hocvien` WHERE `hocvien`.`sbd` = :thiSinhId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':thiSinhId', $thiSinhId);
        $stmt->execute();
        // $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return  $stmt->rowCount() > 0;
    }

    public function createThiSinh($sbd, $hodem, $ten, $ngaysinh, $noisinh, $makythi, $madonvi, $tenphongthi, $matkhau, $profile)
    {
        $sql = "INSERT INTO HOCVIEN (sbd, hodem, ten, ngaysinh, noisinh, makythi, madonvi, tenphongthi, matkhau) 
            VALUES (:sbd, :hodem, :ten, :ngaysinh, :noisinh, :makythi, :madonvi, :tenphongthi, :matkhau)";

        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':sbd', $sbd);
        $stmt->bindParam(':hodem', $hodem);
        $stmt->bindParam(':ten', $ten);
        $stmt->bindParam(':ngaysinh', $ngaysinh);
        $stmt->bindParam(':noisinh', $noisinh);
        $stmt->bindParam(':makythi', $makythi);
        $stmt->bindParam(':madonvi', $madonvi);
        $stmt->bindParam(':tenphongthi', $tenphongthi);
        $stmt->bindParam(':matkhau', $matkhau);

        $stmt->execute();

        return $stmt->debugDumpParams();;
    }

    public function createMatKhau($sbd, $matkhau)
    {
        $query = "INSERT INTO MATKHAU(sbd, matkhau) VALUES (:sbd, :matkhau)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->bindParam(':matkhau', $matkhau);
        $stmt->execute();
    }

    public function getMaMoDun($makythi)
    {
        $sql = "SELECT mamodun FROM modun WHERE makythi = :makythi";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':makythi', $makythi);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }


    public function createAlowexam($sbd, $mamodun)
    {
        $sql = "INSERT INTO allowexam(sbd, mamodun, allow) VALUES (:sbd, :mamodun, 'C')";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->bindParam(':mamodun', $mamodun);
        $stmt->execute();
        // return $stmt->debugDumpParams();
    }




    public function updateThiSinh($sbd, $hodem, $ten, $ngaysinh, $noisinh, $makythi, $madonvi, $tenphongthi, $matkhau, $profile)
    {
    }
    public function deleteThiSinh($sbd)
    {
    }
}
