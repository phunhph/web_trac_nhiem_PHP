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
    public function getsbd($id)
    {
        $query = "SELECT hocvien.sbd FROM hocvien INNER JOIN kythi ON kythi.makythi = hocvien.makythi WHERE hocvien.makythi = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $sbdList = array();

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $sbdList[] = $row->sbd;
        }

        return $sbdList;
    }
    public function getketqua($id, $mamodun)
    {
        $query = "SELECT hocvien.hodem, hocvien.ten, diem.diem, diem.socaudung, diem.thoigianthi, diem.thoigianketthuc 
        FROM hocvien 
        JOIN diem ON diem.sbd = hocvien.sbd 
        WHERE hocvien.sbd = :id AND diem.mamodun=:mamodun";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':mamodun', $mamodun);
        $stmt->execute();

        $resultList = array();

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $resultList[] = $row;
        }
        return $resultList;
    }
    public function getdethisinhBySBD($sbd, $mamt)
    {
        $query = "SELECT macauhoi, socau, padung, pachon, temp FROM dethisinh WHERE sbd = :sbd AND mamodun = :mamt ORDER BY socau";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->bindParam(':mamt', $mamt);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function getcauhoibymchindethi($macauhoi)
    {
        $query = "SELECT tencauhoi, padung, pasai1, pasai2, pasai3, imgviauTencauhoi, imgviauPadung, imgviauPasai1, imgviauPasai2, imgviauPasai3, mucdo, mabode FROM cauhoi WHERE macauhoi = :macauhoi";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':macauhoi', $macauhoi);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $result;
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

    public function tinhtrangthi($kythi)
    {
        // Prepare the SQL query with placeholders
        $sql = "SELECT remote.sbd AS sbd, 
                       remote.ipaddress AS ip, 
                       remote.estatus AS tinhtrang, 
                       hocvien.hodem AS hodem, 
                       hocvien.ten AS ten, 
                       modun.tenmodun AS monthi, 
                       diem.thoigianthi AS bd, 
                       diem.thoigianketthuc AS kt 
                FROM remote 
                JOIN modun ON modun.mamodun = remote.mamodun 
                JOIN diem ON diem.mamodun = remote.mamodun AND diem.sbd = remote.sbd 
                JOIN hocvien ON diem.sbd = hocvien.sbd 
                JOIN kythi ON kythi.makythi = modun.makythi 
                WHERE kythi.makythi = :kythi";

        // Prepare the statement
        $stmt = $this->db->prepare($sql);

        // Bind the parameter
        $stmt->bindParam(':kythi', $kythi);

        // Execute the statement
        $stmt->execute();

        // Fetch the results
        $moduns = array();

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $moduns[] = $row;
        }

        return $moduns;
    }
}
