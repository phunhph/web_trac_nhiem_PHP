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
        $query = "SELECT hocvien.sbd, hocvien.hodem, hocvien.ten, hocvien.ngaysinh, hocvien.noisinh, hocvien.madonvi, donvi.tendonvi, hocvien.tenphongthi
        FROM hocvien
        INNER JOIN donvi ON hocvien.madonvi = donvi.madonvi
        WHERE hocvien.makythi = :makythi AND hocvien.tenphongthi = :tenphong";
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
        $sql = "SELECT madonvi, tendonvi FROM donvi WHERE madonvi = :madonvi";
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
        $sql = "INSERT INTO hocvien (sbd, hodem, ten, ngaysinh, noisinh, makythi, madonvi, tenphongthi, matkhau) 
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
    }

    public function createMatKhau($sbd, $matkhau)
    {
        $query = "INSERT INTO matkhau(sbd, matkhau) VALUES (:sbd, :matkhau)";
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
        $mamodun = array();
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $mamodun[] = $row;
        }
        return $mamodun;
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
        $sql = "UPDATE hocvien SET hodem='$hodem', ten='$ten', ngaysinh='$ngaysinh', noisinh='$noisinh', makythi='$makythi', madonvi='$madonvi', tenphongthi='$tenphongthi', matkhau='$matkhau' WHERE sbd='$sbd'";
        $stmt = $this->db->prepare($sql);
        $success = $stmt->execute();
        return $success ? true : false;
    }

    public function updateDonVi($madonvi, $tendonvi)
    {
        $sql = "UPDATE donvi SET tendonvi='$tendonvi' WHERE madonvi='$madonvi'";
        $stmt = $this->db->prepare($sql);
        $success = $stmt->execute();
        return $success ? true : false;
    }

    public function updateMatKhau($sbd, $matkhau)
    {
        $sql = "UPDATE matkhau SET matkhau='$matkhau' WHERE sbd='$sbd'";
        $stmt = $this->db->prepare($sql);
        $success = $stmt->execute();
        return $success ? true : false;
    }


    public function deleteThiSinh($sbd)
    {
        $sql = "DELETE FROM hocvien WHERE sbd = :sbd";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->execute();
    }

    public function deleteMatKhau($sbd)
    {
        $sql = "DELETE FROM matkhau WHERE sbd = :sbd";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->execute();
    }

    public function deleteDeThiSinh($sbd)
    {
        $sql = "DELETE FROM dethisinh WHERE sbd = :sbd";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->execute();
    }

    public function deleteDiem($sbd)
    {
        $sql = "DELETE FROM diem WHERE sbd = :sbd";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->execute();
    }

    public function deleteAllowexam($sbd)
    {
        $sql = "DELETE FROM allowexam WHERE sbd = :sbd";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->execute();
    }

    public function deleteRemote($sbd)
    {
        $sql = "DELETE FROM remote WHERE sbd = :sbd";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->execute();
    }

    public function getthisinhbymonthis($monthi, $hienthi)
    {
        $sql = "";
        if ($hienthi === "all") {
            // Load tất cả thí sinh
            $sql = "SELECT hocvien.sbd AS 'sbd', hodem, ten, hocvien.ngaysinh AS ns, donvi.tendonvi AS 'donvi', allowexam.allow AS 'chothi' FROM hocvien, donvi, allowexam WHERE (hocvien.madonvi=donvi.madonvi) AND (hocvien.sbd=allowexam.sbd) AND (allowexam.mamodun=:mamodun) ORDER BY hocvien.sbd";
        } else if ($hienthi === 'T') {
            // Load các thí sinh được thi môn đã chọn
            $sql = "SELECT hocvien.sbd AS 'sbd', hodem, ten, hocvien.ngaysinh AS ns, donvi.tendonvi AS 'donvi', allowexam.allow AS 'chothi' FROM hocvien, donvi, allowexam WHERE (hocvien.madonvi=donvi.madonvi) AND (hocvien.sbd=allowexam.sbd) AND (allowexam.mamodun=:mamodun) AND (allowexam.allow='C') ORDER BY hocvien.sbd";
        } else {
            // Load các thí sinh không được thi môn đã chọn
            $sql = "SELECT hocvien.sbd AS 'sbd', hodem, ten, hocvien.ngaysinh AS ns, donvi.tendonvi AS 'donvi', allowexam.allow AS 'chothi' FROM hocvien, donvi, allowexam WHERE (hocvien.madonvi=donvi.madonvi) AND (hocvien.sbd=allowexam.sbd) AND (allowexam.mamodun=:mamodun) AND (allowexam.allow='K') ORDER BY hocvien.sbd";
        }

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':mamodun', $monthi);
        $stmt->execute();
        $thisinhs = array();
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $thisinhs[] = $row;
        }
        return $thisinhs;
    }

    public function getmkbyphong($kythi, $phongthi)
    {
        $query = "SELECT matkhau.*, hocvien.hodem, hocvien.ten 
              FROM `matkhau` 
              JOIN hocvien ON hocvien.sbd = matkhau.sbd 
              WHERE hocvien.makythi = :kythi AND hocvien.tenphongthi = :phongthi";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kythi', $kythi);
        $stmt->bindParam(':phongthi', $phongthi);
        $stmt->execute();

        $moduns = array();

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $moduns[] = $row;
        }

        return $moduns;
    }
    public function getCountphongthi($makythi)
    {
        $query = "SELECT hocvien.tenphongthi, COUNT(*) as solong 
              FROM `hocvien` 
              WHERE hocvien.makythi = :makythi 
              GROUP BY hocvien.tenphongthi
              ORDER BY hocvien.tenphongthi DESC
              LIMIT 1";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':makythi', $makythi);
        $stmt->execute();

        $latestPhongThi = $stmt->fetch(\PDO::FETCH_OBJ);

        return $latestPhongThi;
    }
    public function updatethi($sbd, $mamon)
    {
        $query = "UPDATE allowexam SET allow='C' WHERE sbd=:sbd AND mamodun=:mamon";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->bindParam(':mamon', $mamon);
        $stmt->execute();
    }

    public function updatehuy($sbd, $mamon)
    {
        $query = "UPDATE allowexam SET allow='K' WHERE sbd=:sbd AND mamodun=:mamon";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->bindParam(':mamon', $mamon);
        $stmt->execute();
    }
}
