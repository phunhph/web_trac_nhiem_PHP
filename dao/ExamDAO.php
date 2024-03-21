<?php
require_once 'config.php';
require_once 'models/ModunModel.php';
require_once 'models/DeThiSinhModel.php';
require_once 'models/DeThiProfileModel.php';
require_once 'models/CauhoiModel.php';
require_once 'models/DeThiModel.php';
require_once 'models/DiemModel.php';
class ExamDAO
{
    private $db;
    public function __construct()
    {
        $dbConnection = new DatabaseConnection();
        $this->db = $dbConnection->getConnection();
    }
    // lay mon thi 
    public function getModun($sbd)
    {
        $query = "SELECT modun.mamodun as 'mamodun', tenmodun, batdau, ketthuc FROM modun JOIN allowexam ON modun.mamodun = allowexam.mamodun WHERE allowexam.sbd = :sbd AND allowexam.allow = 'C'";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->execute();

        $moduns = array(); // Assuming you want to return an array of Modun objects

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            // Create a Modun object and add it to the array
            $modun = new Modun($row->mamodun, $row->tenmodun, $row->batdau, $row->ketthuc);
            $moduns[] = $modun;
        }

        return $moduns;
    }
    // thông tin thí sinh
    public function getProfile($sbd)
    {
        $query = "SELECT profile FROM hocvien WHERE sbd = :sbd";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->execute();

        $profile = null;

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            // Assuming 'profile' is a single value, not related to Modun class
            $profile = $row->profile;
        }

        return $profile;
    }
    //môn thi theo tên
    public function getModunByname($name)
    {
        $query = "select mamodun from modun where tenmodun= :tenmodun";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tenmodun', $name);
        $stmt->execute();

        // Assuming you want to return an array of Modun objects

        $row = $stmt->fetch(\PDO::FETCH_OBJ);

        return $row->mamodun;
    }
    // lấy thời gian thi
    public function getThoiGianThi($mamodun)
    {

        $query = " select tongcauhoi, tgthi from thoigianthi where mamodun = :mamodun";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun', $mamodun);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_OBJ);

        return $row;
    }
    // lấy đề thi
    public function getDeThi($mamodun_exam, $sbd)
    {
        $query = "SELECT dethisinh.macauhoi as macauhoi, dethisinh.padung as padung FROM dethisinh, cauhoi, modun, bode WHERE cauhoi.macauhoi = dethisinh.macauhoi AND cauhoi.mabode = bode.mabode AND bode.mamodun = modun.mamodun AND modun.mamodun = :mamodun_exam AND dethisinh.sbd = :sbd ORDER BY dethisinh.socau";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun_exam', $mamodun_exam);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->execute();

        $dethi = array();

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {

            $cauhoi = new DeThiSinh($sbd, $row->macauhoi, null, $row->padung, null, null, $mamodun_exam);
            $dethi[] = $cauhoi;
        }

        return $dethi;
    }
    // lấy điểm (thời gian còn lại)
    public function getDiem($mamodun_exam, $sbd)
    {
        $query = "SELECT timeconlai FROM diem WHERE sbd = :sbd AND mamodun = :mamodun_exam";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->bindParam(':mamodun_exam', $mamodun_exam);
        $stmt->execute();


        $row = $stmt->fetch(\PDO::FETCH_OBJ);
        if ($row !== false) {
            // Access the property only if the fetch was successful
            return $row->timeconlai;
        } else {
            // Handle the case when no results are found
            return -1; // or any default value or error handling mechanism
        }
    }
    // lấy cấu trúc đề
    public function getCauTrucDe($mamodun_exam)
    {
        $query = "SELECT cauhoi, pmucdo, soluong FROM dethiprofile WHERE mamodun = :mamodun_exam AND soluong > 0";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun_exam', $mamodun_exam);
        $stmt->execute();
        $cautrucs = array();
        // Assuming you want to return an object with the specified properties
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            // Create a Modun object and add it to the array
            $cautruc = new DeThiProfile($row->cauhoi, $row->pmucdo, $row->soluong, $mamodun_exam);
            $cautrucs[] = $cautruc;
        }
        return $cautrucs;
    }
    // lấy câu hỏi
    public function getMucDoDe($mamodun_exam, $cauhoi, $soluong)
    {
        $query = "SELECT cauhoi.macauhoi as macauhoi FROM cauhoi, modun, bode 
              WHERE modun.mamodun = bode.mamodun 
                AND bode.mabode = cauhoi.mabode 
                AND modun.mamodun = :mamodun_exam 
                AND cauhoi.mabode = :cauhoi 
                AND cauhoi.mucdo = 'Dễ' 
              ORDER BY RAND() 
              LIMIT :soluong";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun_exam', $mamodun_exam);
        $stmt->bindParam(':cauhoi', $cauhoi);
        $stmt->bindParam(':soluong', $soluong, \PDO::PARAM_INT);
        $stmt->execute();

        $rows = $stmt->fetchAll();
        return $rows;
    }
    public function getMucDoTrungBinh($mamodun_exam, $cauhoi, $soluong)
    {
        $query = "SELECT cauhoi.macauhoi as macauhoi FROM cauhoi, modun, bode 
              WHERE modun.mamodun = bode.mamodun 
                AND bode.mabode = cauhoi.mabode 
                AND modun.mamodun = :mamodun_exam 
                AND cauhoi.mabode = :cauhoi 
                AND cauhoi.mucdo = 'Trung bình' 
              ORDER BY RAND() 
              LIMIT :soluong";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun_exam', $mamodun_exam);
        $stmt->bindParam(':cauhoi', $cauhoi);
        $stmt->bindParam(':soluong', $soluong, \PDO::PARAM_INT);
        $stmt->execute();

        $rows = $stmt->fetchAll();
        return $rows;
    }
    // lấy đáp án đã chọn
    public function getTenp($sbd, $macauhoi)
    {
        $query = "SELECT * FROM dethisinh WHERE sbd=:sbd AND macauhoi=:macauhoi";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->bindParam(':macauhoi', $macauhoi);
        $stmt->execute();

        $dethi = null;

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $cauhoi = new DeThiSinh($row->sbd, $row->macauhoi, $row->socau, $row->padung, $row->pachon, $row->temp, $row->mamodun);
            $dethi = $cauhoi;
        }

        return $dethi;
    }
    public function getMucDoKho($mamodun_exam, $cauhoi, $soluong)
    {
        $query = "SELECT cauhoi.macauhoi as macauhoi FROM cauhoi, modun, bode 
              WHERE modun.mamodun = bode.mamodun 
                AND bode.mabode = cauhoi.mabode 
                AND modun.mamodun = :mamodun_exam 
                AND cauhoi.mabode = :cauhoi 
                AND cauhoi.mucdo = 'Khó' 
              ORDER BY RAND() 
              LIMIT :soluong";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamodun_exam', $mamodun_exam);
        $stmt->bindParam(':cauhoi', $cauhoi);
        $stmt->bindParam(':soluong', $soluong, \PDO::PARAM_INT);
        $stmt->execute();

        $rows = $stmt->fetchAll();
        return $rows;
    }
    // lấy mã đề và đáp án đúng
    public function getDeThiSinh($mamonthi, $sbd)
    {
        $query = "SELECT dethisinh.macauhoi as macauhoi, dethisinh.padung as padung 
                  FROM dethisinh, cauhoi, modun, bode 
                  WHERE cauhoi.macauhoi = dethisinh.macauhoi 
                    AND cauhoi.mabode = bode.mabode 
                    AND bode.mamodun = modun.mamodun 
                    AND modun.mamodun = :mamonthi 
                    AND dethisinh.sbd = :sbd";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mamonthi', $mamonthi);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->execute();

        $dethi = array();

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {

            $cauhoi = new DeThiSinh(null, $row->macauhoi, null, $row->padung, null, null, null);
            $dethi[] = $cauhoi;
        }

        return $dethi;
    }
    // tạo mới diem
    public function CreateDiem($mamonthi, $sbd)
    {
        $query = "INSERT INTO diem (sbd, mamodun) VALUES (:sbd, :mamonthi)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->bindParam(':mamonthi', $mamonthi);
        $stmt->execute();
    }
    // updete diem;
    public function UpdateDiem($mamonthi, $sbd, $time_add, $time12)
    {
        $query = "UPDATE diem SET timeconlai = :timeconlai, thoigianthi = :time_add WHERE sbd = :sbd AND mamodun = :mamonthi";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->bindParam(':mamonthi', $mamonthi);
        $stmt->bindParam(':time_add', $time_add);
        $stmt->bindParam(':timeconlai', $time12);
        $stmt->execute();
    }
    public function UpdateDiemDone($tongdiem, $caudung, $sbd, $modunid, $time)
    {
        $query = "UPDATE diem SET diem = :tongdiem, socaudung = :caudung, timeconlai = :time WHERE sbd = :sbd AND mamodun = :modunid";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tongdiem', $tongdiem);
        $stmt->bindParam(':caudung', $caudung);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->bindParam(':modunid', $modunid);

        $stmt->execute();
    }
    // lấy thời gian bắt đầu, thời gian kết thức
    public function getTimeSE($sbd, $modunid)
    {
        $query = "SELECT DATE_FORMAT(thoigianthi,'%H:%i:%s ngày %d/%m/%Y') as thoigianthi, DATE_FORMAT(thoigianketthuc,'%H:%i:%s ngày %d/%m/%Y') as thoigianketthuc FROM diem WHERE sbd = :sbd AND mamodun = :modunid";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->bindParam(':modunid', $modunid);
        $stmt->execute();

        $results = $stmt->fetch(\PDO::FETCH_OBJ);

        if ($results !== false) {
            // Trả về một đối tượng Diem với thông tin thời gian
            return new Diem(null, null, null, null, $results->thoigianthi, null, $results->thoigianketthuc);
        } else {
            // Trả về giá trị mặc định hoặc xử lý lỗi nếu cần
            return new Diem($sbd, $modunid, null, null, null, null, null);
        }
    }

    // Tạo mới remote
    public function CreateRemote($mamonthi, $sbd, $ip)
    {
        $query = "INSERT INTO remote (sbd, mamodun, ipaddress, estatus) VALUES (:sbd, :mamonthi, :ip, 'Đang thi')";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->bindParam(':mamonthi', $mamonthi);
        $stmt->bindParam(':ip', $ip);
        $stmt->execute();
    }
    // lấy câu hỏi
    public function getCauHoi($macauhoi)
    {
        $query = "SELECT  tencauhoi, padung, pasai1, pasai2, pasai3, imgviauTencauhoi, imgviauPadung, imgviauPasai1, imgviauPasai2, imgviauPasai3 FROM cauhoi WHERE macauhoi = :macauhoi";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':macauhoi', $macauhoi); // Bind the value to the placeholder
        $stmt->execute();

        $cauhois = null;

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            // Create a CauHoi instance with all properties from the database
            $cauhoi = new CauHoi(
                null,
                $row->tencauhoi,
                $row->padung,
                $row->pasai1,
                $row->pasai2,
                $row->pasai3,
                $row->imgviauTencauhoi,
                $row->imgviauPadung,
                $row->imgviauPasai1,
                $row->imgviauPasai2,
                $row->imgviauPasai3,
                null,
                null
            );
            $cauhois = $cauhoi;
        }

        return $cauhois;
    }
    // lưu đáp án
    public function CreatePaDung($sbd, $macauhoi, $ii, $mamonthi, $dapan)
    {
        $query = "INSERT INTO dethisinh (sbd, macauhoi, socau, padung, mamodun) VALUES (:sbd, :macauhoi, :socau, :dapan, :mamonthi)";
        $cau = "cau " . $ii;
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->bindParam(':macauhoi', $macauhoi);
        $stmt->bindParam(':socau', $cau);
        $stmt->bindParam(':dapan', $dapan);
        $stmt->bindParam(':mamonthi', $mamonthi);
        $stmt->execute();
    }
    // update temp
    public function UpdateTemp($subdata, $sbd, $beg, $modunid)
    {
        // Giả sử $mamonthi và $time_add đã được định nghĩa trong phương thức của bạn.

        $query = "UPDATE dethisinh SET temp = :subdata WHERE sbd = :sbd AND mamodun = :modunid AND socau = :beg";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':subdata', $subdata);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->bindParam(':modunid', $_SESSION['modunid']); // Chú ý: Sửa $modunid thành $_SESSION['modunid']
        $stmt->bindParam(':beg', $beg);

        $stmt->execute();
    }
    // update time
    public function UpdateTime($time, $sbd, $modunid)
    {
        $query = "UPDATE diem SET timeconlai = :time WHERE sbd = :sbd AND mamodun = :modunid";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->bindParam(':modunid', $modunid);

        $stmt->execute();
    }

    // update time end
    public function UpdateTimeEnd($time, $tend, $sbd, $modunid)
    {
        $query = "UPDATE diem SET timeconlai = :time, thoigianketthuc = :tend WHERE sbd = :sbd AND mamodun = :modunid";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':tend', $tend);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->bindParam(':modunid', $modunid);

        $stmt->execute();
    }

    // update remote
    public function UpdateRemote($status, $sbd, $modunid)
    {
        $query = "UPDATE remote SET estatus = :status WHERE sbd = :sbd AND mamodun = :modunid";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->bindParam(':modunid', $modunid);

        $stmt->execute();
    }
    // lấy số thứ tự trong bảng tblhocvien
    public function getStt($sbd)
    {
        $query = "SELECT stt FROM tblhocvien WHERE sbd = :sbd";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':sbd', $sbd);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_OBJ);

        if ($row !== false) {
            // Trả về giá trị của trường 'stt'
            return $row->stt;
        } else {
            // Xử lý trường hợp không tìm thấy kết quả
            return -1; // hoặc bất kỳ giá trị mặc định hoặc cơ chế xử lý lỗi nào đó
        }
    }
}
