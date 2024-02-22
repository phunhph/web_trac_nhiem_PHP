<?php
require_once 'models/ModunModel.php';
require_once 'models/BodeModel.php';
class QuanLyMonThiDAO
{
    private $db;
    public function __construct()
    {
        $dbConnection = new DatabaseConnection();
        $this->db = $dbConnection->getConnection();
    }
    // môn thi
    public function createMonThi($mamodun, $tenmodun, $batdau, $ketthuc, $makythi)
    {
        $query = "INSERT INTO `modun`(`mamodun`, `tenmodun`, `batdau`, `ketthuc`, `makythi`) VALUES (:mamodun, :tenmodun, :batdau, :ketthuc, :makythi)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun', $mamodun, PDO::PARAM_STR);
        $stmt->bindParam(':tenmodun', $tenmodun, PDO::PARAM_STR);
        $stmt->bindParam(':batdau', $batdau, PDO::PARAM_STR);
        $stmt->bindParam(':ketthuc', $ketthuc, PDO::PARAM_STR);
        $stmt->bindParam(':makythi', $makythi, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function getMonThi($makythi)
    {
        $query = "SELECT modun.* FROM `modun` JOIN kythi ON kythi.makythi = modun.makythi WHERE modun.makythi=:makythi";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':makythi', $makythi, PDO::PARAM_STR);
        $stmt->execute();


        $moduns = array();

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {

            $modun = new Modun($row->mamodun, $row->tenmodun, $row->batdau, $row->ketthuc);
            $moduns[] = $modun;
        }

        return $moduns;
    }

    public function fixmonthi($mamodun, $tenmodun, $batdau, $ketthuc)
    {
        $query = "UPDATE `modun` SET `tenmodun`=:tenmodun, `batdau`=:batdau, `ketthuc`=:ketthuc WHERE `mamodun`=:mamodun";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun', $mamodun, PDO::PARAM_STR);
        $stmt->bindParam(':tenmodun', $tenmodun, PDO::PARAM_STR);
        $stmt->bindParam(':batdau', $batdau, PDO::PARAM_STR);
        $stmt->bindParam(':ketthuc', $ketthuc, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deleteMonThi($mamodun)
    {
        $query = "DELETE FROM `modun`  WHERE `mamodun`=:mamodun";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun', $mamodun, PDO::PARAM_STR);
        $stmt->execute();
    }
    // nội dung thi
    public function createNoiDungThi($mabode, $tenbode, $mamodun)
    {
        $query = "INSERT INTO `bode`(`mabode`, `tenbode`, `mamodun`) VALUES (:mabode, :tenbode, :mamodun)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mabode', $mabode, PDO::PARAM_STR);
        $stmt->bindParam(':tenbode', $tenbode, PDO::PARAM_STR);
        $stmt->bindParam(':mamodun', $mamodun, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getNoiDungThi($mamodun)
    {
        $query = "SELECT bode.mabode, bode.tenbode, modun.tenmodun, kythi.tenkythi 
                  FROM `bode` 
                  JOIN modun ON modun.mamodun = bode.mamodun 
                  JOIN kythi ON kythi.makythi = modun.makythi 
                  WHERE bode.mamodun=:mamodun";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun', $mamodun, PDO::PARAM_STR);
        $stmt->execute();
        $noiDungThi = array(); // Tạo một mảng chứa dữ liệu nội dung thi

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $noiDungThi[] = $row; // Thêm dữ liệu vào mảng
        }
        return $noiDungThi;
    }

    public function fixNoiDungThi($mabode, $tenbode, $mamodun)
    {
        $mabode = trim($mabode);
        $query = "UPDATE `bode` SET `tenbode` = :tenbode, `mamodun` = :mamodun WHERE `mabode` = :mabode";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mabode', $mabode, PDO::PARAM_STR);
        $stmt->bindParam(':tenbode', $tenbode, PDO::PARAM_STR);
        $stmt->bindParam(':mamodun', $mamodun, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deleteNoiDungThi($mabode)
    {
        $mabode = trim($mabode);
        $query = "DELETE FROM `bode` WHERE `mabode` = :mabode";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mabode', $mabode, PDO::PARAM_STR);
        $stmt->execute();
    }
}
