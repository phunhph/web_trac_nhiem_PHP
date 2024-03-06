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
        $mamodun = trim($mamodun);
        $tenmodun = trim($tenmodun);
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
        $mamodun = trim($mamodun);
        $tenmodun = trim($tenmodun);
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
        $mamodun = trim($mamodun);
        $query = "DELETE FROM `modun` WHERE `mamodun`=:mamodun";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun', $mamodun, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deleteremote($mamodun)
    {
        $query = "DELETE remote FROM remote INNER JOIN modun ON modun.mamodun = remote.mamodun WHERE remote.mamodun = :mamodun";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun', $mamodun, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deletethoigianthi($mamodun)
    {
        $query = "DELETE thoigianthi FROM thoigianthi INNER JOIN modun ON modun.mamodun = thoigianthi.mamodun WHERE thoigianthi.mamodun = :mamodun";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun', $mamodun, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deletediem($mamodun)
    {
        $query = "DELETE diem FROM diem INNER JOIN modun ON modun.mamodun = diem.mamodun WHERE diem.mamodun = :mamodun";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun', $mamodun, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deletedethisinh($mamodun)
    {
        $query = "DELETE dethisinh FROM dethisinh INNER JOIN modun ON modun.mamodun = dethisinh.mamodun WHERE dethisinh.mamodun = :mamodun";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun', $mamodun, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deletedethiprofilebymodun($mamodun)
    {
        $query = "DELETE dethiprofile FROM dethiprofile INNER JOIN modun ON modun.mamodun = dethiprofile.mamodun WHERE dethiprofile.mamodun = :mamodun";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun', $mamodun, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deletebode($mamodun)
    {
        $query = "DELETE bode FROM bode INNER JOIN modun ON modun.mamodun = bode.mamodun WHERE bode.mamodun = :mamodun";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun', $mamodun, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deletecauhoi($mamodun)
    {
        $query = "DELETE cauhoi FROM cauhoi INNER JOIN bode ON bode.mabode = cauhoi.mabode INNER JOIN modun ON modun.mamodun = bode.mamodun WHERE modun.mamodun = :mamodun";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun', $mamodun, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deleteallowexam($mamodun)
    {
        $query = "DELETE allowexam FROM allowexam INNER JOIN modun ON modun.mamodun = allowexam.mamodun WHERE allowexam.mamodun = :mamodun";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun', $mamodun, PDO::PARAM_STR);
        $stmt->execute();
    }


    // nội dung thi
    public function createNoiDungThi($mabode, $tenbode, $mamodun)
    {
        $mabode = trim($mabode);
        $tenbode = trim($tenbode);
        $mamodun = trim($mamodun);
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
    public function getmobodevaten($mamodun)
    {
        $query = "select mabode, tenbode from bode where mamodun=:mamodun";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun', $mamodun, PDO::PARAM_STR);
        $stmt->execute();
        $noiDungThi = array();

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $noiDungThi[] = $row;
        }
        return $noiDungThi;
    }
    public function getdethiprofile($mabode)
    {
        $query = "SELECT soluong, dethiprofile.pmucdo FROM dethiprofile WHERE cauhoi = :mabode";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mabode', $mabode, PDO::PARAM_STR);
        $stmt->execute();

        $results = array();
        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            $results[] = $row;
        }
        return $results;
    }
    public function deletedethiprofile($mamodun)
    {
        $query = "DELETE FROM dethiprofile WHERE mamodun=:mamodun";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun', $mamodun, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function craetedethiprofile($id, $cauhoi, $pmucdo, $soluong, $mamodun)
    {
        $query = "INSERT INTO dethiprofile (id, cauhoi, pmucdo, soluong, mamodun) VALUES (:id, :cauhoi, :pmucdo, :soluong, :mamodun)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':cauhoi', $cauhoi, PDO::PARAM_STR);
        $stmt->bindParam(':pmucdo', $pmucdo, PDO::PARAM_STR);
        $stmt->bindParam(':soluong', $soluong, PDO::PARAM_INT);
        $stmt->bindParam(':mamodun', $mamodun, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function demcauhoi($mabode)
    {
        $query = "SELECT COUNT(*) as sde, mucdo 
    FROM `cauhoi`
    WHERE mabode = :mabode
    GROUP BY mucdo";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mabode', $mabode, PDO::PARAM_STR);
        $stmt->execute();

        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }

    public function fixNoiDungThi($mabode, $tenbode, $mamodun)
    {
        $mabode = trim($mabode);
        $tenbode = trim($tenbode);
        $mamodun = trim($mamodun);
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
    public function deletedethisinhbymabode($mabode)
    {
        $mabode = trim($mabode);
        $query = "DELETE dethisinh
        FROM dethisinh
        JOIN cauhoi ON dethisinh.macauhoi = cauhoi.macauhoi
        JOIN bode ON bode.mabode = cauhoi.mabode
        WHERE cauhoi.mabode = :mabode";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mabode', $mabode, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deletecauhoibymabode($mabode)
    {
        $mabode = trim($mabode);
        $query = "DELETE cauhoi FROM cauhoi INNER JOIN bode ON bode.mabode = cauhoi.mabode WHERE bode.mabode = :mabode";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mabode', $mabode, PDO::PARAM_STR);
        $stmt->execute();
    }
}
