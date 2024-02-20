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
    public function createMonThi($mamodun, $tenmondun, $start, $end, $makythi)
    {
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


    public function fixMonThi($mamodun, $start, $end)
    {
    }
    public function deleteMonThi($mamodun)
    {
    }
    // nội dung thi
    public function createNoiDungThi($mamodun, $tenmondun, $start, $end, $makythi)
    {
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

    public function fixNoiDungThi($mamodun, $start, $end)
    {
    }
    public function deleteNoiDungThi($mamodun)
    {
    }
}
