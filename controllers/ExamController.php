<?php
class ExamController
{
    private $examDAO;
    public function __construct()
    {
        $this->examDAO = new ExamDAO();
    }
    public function index()
    {
        if (isset($_SESSION['user_info']['sbd'])) $sbd = $_SESSION['user_info']['sbd'];
        else header('location: index.php?controller=login');
        #------------------------------------------------------------------------------------------------------------------------#
        if (isset($_GET['ID'])) {
            // lấy mã modun
            $mamodun_exam = $this->examDAO->getModunByname($_GET['ID']);
            // lấy thông tin bài thi về số câu và thời gian làm bài tính theo phuts
            $s = $this->examDAO->getThoiGianThi($mamodun_exam);
            $tongch = $s->tongcauhoi;
            $ttime = $s->tgthi;
            $_SESSION['time12'] = $s->tgthi;
            $_SESSION['modunid'] = $mamodun_exam;
            // lấy đề thi và đáp án đúng
            $t1 = $this->examDAO->getDeThi($mamodun_exam, $_SESSION['user_info']['sbd']);
            // lấy thời gian còn lại của bài thi
            $t2 = $this->examDAO->getDiem($mamodun_exam, $_SESSION['user_info']['sbd']);
            $time = $t2;
            $timnow = time();
            $i = 1;
            $al = array();
            $dapan = array();

            if (count($t1)  > 0 && $time > 0) //Đang thi dở, lấy lại đề và làm tiếp.
            {
                foreach ($t1 as $dt) {
                    $al[$i - 1] = $dt->macauhoi;
                    switch ($dt->padung) {
                        case 'A':
                            $dapan[$i] = 1;
                            break;
                        case 'B':
                            $dapan[$i] = 2;
                            break;
                        case 'C':
                            $dapan[$i] = 3;
                            break;
                        case 'D':
                            $dapan[$i] = 4;
                            break;
                        default:
                    }
                    $i++;
                }
                $_SESSION['tongcauhoi'] = $i - 1; //if tổng câu hỏi < $r['tongcauhoi'] sinh thêm...?
                $_SESSION['mangdapan'] = $dapan; //
                $_SESSION['mangdethi'] = $al; //
            } else if (count($t1) > 0 && $time <= 0) //Thi xong
            {
                unset($_SESSION['user_info']);
                $error = "Bạn đã hoàn thành bài thi của môn này!";
            } else if (count($t1) < 1) { //Sinh đề
                // lấy cấu trúc đề
                $data = $this->examDAO->getCauTrucDe($mamodun_exam);
                $i = 1;
                // lấy câu hỏi theo mức độ
                foreach ($data as $row) {
                    switch ($row->getPmucdo()) {
                        case 0:
                            $ui_e = $this->examDAO->getMucDoDe($mamodun_exam, $row->getCauhoi(), $row->getSoluong());
                            break;
                        case 1:
                            $ui_e = $this->examDAO->getMucDoTrungBinh($mamodun_exam, $row->getCauhoi(), $row->getSoluong());
                            break;
                        case 2:
                            $ui_e = $this->examDAO->getMucDoKho($mamodun_exam, $row->getCauhoi(), $row->getSoluong());
                            break;
                        default:
                    }
                    // lưu câu hỏi
                    foreach ($ui_e as $r) {
                        $al[$i] = $r['macauhoi'];
                        $i++;
                    }
                }

                $_SESSION['tongcauhoi'] = --$i;
                $j = 1;
                while ($j <= $i) {
                    $dapan[$j] = rand(1, 4);
                    $j++;
                }
                $_SESSION['mangdapan'] = $dapan;
                shuffle($al); // sort random. index -> 0;
                $_SESSION['mangdethi'] = $al;
            }
            require_once 'views/exam/client/xnthi.php';
        } else {
            header('location: index.php');
        }
    }
    public function exam()
    {

        if (isset($_SESSION['user_info']['sbd'])) $sbd = $_SESSION['user_info']['sbd'];
        else header('location: index.php?controller=login');
        #------------------------------------------------------------------------------------------------------------------------#

        #------------------------------------------------------------------------------------------------------------------------#
        $tenmonthi = $_GET['ID'];
        $mamonthi = $_SESSION['modunid'];
        $t1 = $this->examDAO->getDeThiSinh($mamonthi, $sbd);
        $t2 = $this->examDAO->getDiem($mamonthi, $sbd);
        #------------------------------------------------------------------------------------------------------------------------#
        if ($t2 >= 0 && count($t1) > 0) {
        } else
            
        if (isset($_SESSION['time12'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
            $this->examDAO->CreateDiem($mamonthi, $sbd);
            $this->examDAO->CreateRemote($mamonthi, $sbd, $ip);
            $get = $_GET['fx'];
            $time_add = date("Y-m-d H:i:s", $get);
            $time12 = $_SESSION['time12'] * 60;
            $this->examDAO->UpdateDiem($mamonthi, $sbd, $time_add, $time12);
        }
        #------------------------------------------------------------------------------------------------------------------------#
        $time = $this->examDAO->getDiem($mamonthi, $sbd);

        if (count($t1) >  0 && $t2 > 0) //Trường hợp bài đang làm dở.
        {
            $i = 0;
            $j = 1;
            $dapan = array();
            $dapan = $_SESSION['mangdapan'];
            $cauhois = array();
            $cauhois = $_SESSION['mangdethi'];


            while ($i < $_SESSION['tongcauhoi']) {
                $macauhoi = $cauhois[$i];

                // lấy đáp án đã chọn
                $temp = $this->examDAO->getTenp($sbd, $macauhoi);
                // lấy câu hỏi
                $h = $this->examDAO->getCauHoi($macauhoi);
                // lưu chuyển đổi
                $h->setTenCauHoi(str_replace("<", "&lt;", $h->getTenCauHoi()));
                $h->setPadung(str_replace("<", "&lt;", $h->getPadung()));
                $h->setPasai1(str_replace("<", "&lt;", $h->getPasai1()));
                $h->setPasai2(str_replace("<", "&lt;", $h->getPasai2()));
                $h->setPasai3(str_replace("<", "&lt;", $h->getPasai3()));
                $h->setTenCauHoi(str_replace(">", "&gt;", $h->getTenCauHoi()));
                $h->setPadung(str_replace(">", "&gt;", $h->getPadung()));
                $h->setPasai1(str_replace(">", "&gt;", $h->getPasai1()));
                $h->setPasai2(str_replace(">", "&gt;", $h->getPasai2()));
                $h->setPasai3(str_replace(">", "&gt;", $h->getPasai3()));
                $ran = $dapan[$i + 1];
                if (($i + 1) < 10) $ii = '0' . ($i + 1);
                else $ii = $i + 1;
                switch ($temp->getPadung()) {
                    case 'A':
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            $h->getPadung(),
                            $h->getPasai1(),
                            $h->getPasai2(),
                            $h->getPasai3(),
                            $h->getImgviauTencauhoi(),
                            $h->getImgviaupadung(),
                            $h->getImgviaupasai1(),
                            $h->getImgviaupasai2(),
                            $h->getImgviaupasai3(),
                            $temp->getTemp(),
                            null
                        );
                        $bode[] = $cauhoi;
                        break;
                    case 'B':
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            $h->getPasai1(),
                            $h->getPadung(),
                            $h->getPasai2(),
                            $h->getPasai3(),
                            $h->getImgviauTencauhoi(),
                            $h->getImgviaupasai1(),
                            $h->getImgviaupadung(),
                            $h->getImgviaupasai2(),
                            $h->getImgviaupasai3(),
                            $temp->getTemp(),
                            null
                        );
                        $bode[] = $cauhoi;
                        break;
                    case 'C':
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            $h->getPasai1(),
                            $h->getPasai2(),
                            $h->getPadung(),
                            $h->getPasai3(),
                            $h->getImgviauTencauhoi(),
                            $h->getImgviaupasai1(),
                            $h->getImgviaupasai2(),
                            $h->getImgviaupadung(),
                            $h->getImgviaupasai3(),
                            $temp->getTemp(),
                            null
                        );
                        $bode[] = $cauhoi;
                        break;
                    case 'D':
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            $h->getPasai1(),
                            $h->getPasai2(),
                            $h->getPasai3(),
                            $h->getPadung(),
                            $h->getImgviauTencauhoi(),
                            $h->getImgviaupasai1(),
                            $h->getImgviaupasai2(),
                            $h->getImgviaupasai3(),
                            $h->getImgviaupadung(),
                            $temp->getTemp(),
                            null
                        );
                        $bode[] = $cauhoi;
                        break;
                }
                $i++;
            }
        } else  //Trường hợp thi mới.
        {

            $i = 0;
            $dapans = array();
            $dapans = $_SESSION['mangdapan'];
            $cauhoi = array();
            $cauhois = $_SESSION['mangdethi'];
            $j = 1;
            $bode = array();
            while ($i < $_SESSION['tongcauhoi']) {
                $macauhoi = $cauhois[$i];
                // lấy câu hỏi
                $h = $this->examDAO->getCauHoi($macauhoi);
                // lưu chuyển đổi
                $h->setTenCauHoi(str_replace("<", "&lt;", $h->getTenCauHoi()));
                $h->setPadung(str_replace("<", "&lt;", $h->getPadung()));
                $h->setPasai1(str_replace("<", "&lt;", $h->getPasai1()));
                $h->setPasai2(str_replace("<", "&lt;", $h->getPasai2()));
                $h->setPasai3(str_replace("<", "&lt;", $h->getPasai3()));
                $h->setTenCauHoi(str_replace(">", "&gt;", $h->getTenCauHoi()));
                $h->setPadung(str_replace(">", "&gt;", $h->getPadung()));
                $h->setPasai1(str_replace(">", "&gt;", $h->getPasai1()));
                $h->setPasai2(str_replace(">", "&gt;", $h->getPasai2()));
                $h->setPasai3(str_replace(">", "&gt;", $h->getPasai3()));

                // tạo đáp án
                $count = $i + 1;
                $ran = 0;
                $ran = $dapans[$count];
                if (($i + 1) < 10) $ii = '0' . ($i + 1);
                else $ii = $i + 1;
                if ($ran == 1) {
                    $dapan = 'A';
                    $this->examDAO->CreatePaDung($sbd, $macauhoi, $ii, $mamonthi, $dapan);
                    $cauhoi = new Dethi(
                        $ii,
                        $h->getTenCauHoi(),
                        $h->getPadung(),
                        $h->getPasai1(),
                        $h->getPasai2(),
                        $h->getPasai3(),
                        $h->getImgviauTencauhoi(),
                        $h->getImgviaupadung(),
                        $h->getImgviaupasai1(),
                        $h->getImgviaupasai2(),
                        $h->getImgviaupasai3(),
                        null,
                        null
                    );
                    $bode[] = $cauhoi;
                } elseif ($ran == 2) {
                    $dapan = 'B';
                    $this->examDAO->CreatePaDung($sbd, $macauhoi, $ii, $mamonthi, $dapan);
                    $cauhoi = new Dethi(
                        $ii,
                        $h->getTenCauHoi(),
                        $h->getPasai1(),
                        $h->getPadung(),
                        $h->getPasai2(),
                        $h->getPasai3(),
                        $h->getImgviauTencauhoi(),
                        $h->getImgviaupasai1(),
                        $h->getImgviaupadung(),
                        $h->getImgviaupasai2(),
                        $h->getImgviaupasai3(),
                        null,
                        null
                    );
                    $bode[] = $cauhoi;
                } elseif ($ran == 3) {
                    $dapan = 'C';
                    $this->examDAO->CreatePaDung($sbd, $macauhoi, $ii, $mamonthi, $dapan);
                    $cauhoi = new Dethi(
                        $ii,
                        $h->getTenCauHoi(),
                        $h->getPasai1(),
                        $h->getPasai2(),
                        $h->getPadung(),
                        $h->getPasai3(),
                        $h->getImgviauTencauhoi(),
                        $h->getImgviaupasai1(),
                        $h->getImgviaupasai2(),
                        $h->getImgviaupadung(),
                        $h->getImgviaupasai3(),
                        null,
                        null
                    );
                    $bode[] = $cauhoi;
                } elseif ($ran == 4) {
                    $dapan = 'D';
                    $this->examDAO->CreatePaDung($sbd, $macauhoi, $ii, $mamonthi, $dapan);
                    $cauhoi = new Dethi(
                        $ii,
                        $h->getTenCauHoi(),
                        $h->getPasai1(),
                        $h->getPasai2(),
                        $h->getPasai3(),
                        $h->getPadung(),
                        $h->getImgviauTencauhoi(),
                        $h->getImgviaupasai1(),
                        $h->getImgviaupasai2(),
                        $h->getImgviaupasai3(),
                        $h->getImgviaupadung(),
                        null,
                        null
                    );
                    $bode[] = $cauhoi;
                }
                $i++;
            }
        }

        require_once 'views/exam/client/exam.php';
    }
    public function updateTemp()
    {
        if (isset($_POST['id']) && isset($_POST['name'])) {
            $data = $_POST['id'];
            $name = $_POST['name'];
            $beg = substr($name, 0, 3);
            $temp = substr($name, 3);
            if (strlen($temp) == 1) $temp = "0" . $temp;
            $beg = $beg . " " . $temp;
            $subdata = substr($data, 0, 1);
            $sbd = $_SESSION['user_info']['sbd'];
            $modunid = $_SESSION['modunid'];
            $this->examDAO->UpdateTemp($subdata, $sbd, $beg, $modunid);
        }
    }
    public function updateTime()
    {
        $sbd = $_SESSION['user_info']['sbd'];
        $modunid = $_SESSION['modunid'];
        $time = $_POST['time'];
        echo $time;
        $this->examDAO->UpdateTime($time, $sbd, $modunid);
    }
    public function updateTimeEnd()
    {
        $sbd = $_SESSION['user_info']['sbd'];
        $modunid = $_SESSION['modunid'];
        $time = 0;
        $k = $_POST['tg'];
        $tend = date("Y-m-d H:i:s", $k);
        $_SESSION['tgth'] =  ($_SESSION['time12'] * 60) - $_POST['time'];
        $status = 'Đã thi xong';
        echo 'time:' . $time, $tend, $sbd, $modunid . 'remote: ' . $status, $sbd, $modunid;
        $this->examDAO->UpdateTimeEnd($time, $tend, $sbd, $modunid);
        $this->examDAO->UpdateRemote($status, $sbd, $modunid);
    }
    // submit and check exam
    public function submitExam()
    {

        // lấy thời gian thi
        $tm = $_SESSION['tgth'];

        $hour = (int)($tm / 3600);

        $tm = $tm % 3600;

        $minute = (int)($tm / 60);

        $tm = $tm % 60;
        $second = $tm;
        if ($hour < 10) $hour = "0" . $hour;
        if ($minute < 10) $minute = "0" . $minute;
        if ($second < 10) $second = "0" . $second;
        $re = $hour . ":" . $minute . ":" . $second . " (giờ:phút:giây)";
        if (isset($_SESSION['user_info']['sbd'])) {
            $namef = $_SESSION['user_info']['hodem'];
            $name = $_SESSION['user_info']['ten'];
            $sbd = $_SESSION['user_info']['sbd'];
        } else header('location: index.php');
        // số lượng cu hỏi
        $tongcauhoi = $_SESSION['tongcauhoi'];
        // lấy tài đáp án và tài liệu
        $dapans = array();
        $dapans = $_SESSION['mangdapan']; //Mảng đáp án sinh ra từ trước. chỉ số chạy từ 1
        $cauhois = array();
        $cauhois = $_SESSION['mangdethi']; //Mảng lưu mã cau hỏi trong đề thi đã sinh trước. chỉ số chạy từ 0
        $a = array();
        $b = array();
        $c = array();
        $caudung = 0;
        $i = 1;
        $j = 1;
        // setup đáp án và kiểm tra kết quả
        while ($i <= $_SESSION['tongcauhoi']) {
            if ($dapans[$i] == 1) $dapandung = "A";
            else if ($dapans[$i] == 2) $dapandung = "B";
            else if ($dapans[$i] == 3) $dapandung = "C";
            else if ($dapans[$i] == 4) $dapandung = "D";
            if (isset($_POST['cau' . $i])) {
                if ($_POST['cau' . $i] == $dapandung) {
                    $caudung++;
                    $a[$i] = 1;
                } else $a[$i] = 0;
                $b[$i] = $_POST['cau' . $i];
            } else $a[$i] = -1;
            $c[$i] = $dapandung;
            $i++;
        }
        $tongdiem = $caudung * (10 / $_SESSION['tongcauhoi']);


        if ($tongdiem < 5) {

            $dz = $this->examDAO->getStt($sbd);
            // câu điều kiện chưa sử dụng
            if ($dz > 0) {
                $ht = rand(($_SESSION['tongcauhoi'] - round(($_SESSION['tongcauhoi'] / 2))) + 1, ($_SESSION['tongcauhoi'] - round(($_SESSION['tongcauhoi'] / 2))) + 4);
                $htsum = $ht - $caudung;
                $temp = array();
                $j = 1;
                for ($i = 1; $i <= $_SESSION['tongcauhoi']; $i++)
                    if ($a[$i] == 0 || $a[$i] == -1) {
                        $temp[$j] = $i;
                        $j++;
                    }
                $rKey = array_rand($temp, $htsum);
                $i = 0;
                while ($i < $htsum) {
                    if (isset($temp[$rKey[$i]])) {
                        if ($dapans[$temp[$rKey[$i]]] == 1) $dapandung = "A";
                        else if ($dapans[$temp[$rKey[$i]]] == 2) $dapandung = "B";
                        else if ($dapans[$temp[$rKey[$i]]] == 3) $dapandung = "C";
                        else if ($dapans[$temp[$rKey[$i]]] == 4) $dapandung = "D";
                        $a[$temp[$rKey[$i]]] = 1;
                        $b[$temp[$rKey[$i]]] = $dapandung;
                        $c[$temp[$rKey[$i]]] = $dapandung;
                    }
                    $i++;
                }
                $caudung = $ht;
                $tongdiem = $caudung * (10 / $_SESSION['tongcauhoi']);
            }
        }
        $modunid = $_SESSION['modunid'];
        $this->examDAO->UpdateDiemDone($tongdiem, $caudung, $sbd, $modunid, 0);
        // lấy thời gian bắt đầu và thời gian kết thức

        $tgbd = $this->examDAO->getTimeSE($sbd, $modunid);
        // hien dap an dung va dap an
        $i = 1;
        while ($i <= $_SESSION['tongcauhoi']) {
            $macauhoi = $cauhois[$i - 1];
            // lấy câu hỏi
            $h = $this->examDAO->getCauHoi($macauhoi);
            // lưu chuyển đổi
            $h->setTenCauHoi(str_replace("<", "&lt;", $h->getTenCauHoi()));
            $h->setPadung(str_replace("<", "&lt;", $h->getPadung()));
            $h->setPasai1(str_replace("<", "&lt;", $h->getPasai1()));
            $h->setPasai2(str_replace("<", "&lt;", $h->getPasai2()));
            $h->setPasai3(str_replace("<", "&lt;", $h->getPasai3()));
            $h->setTenCauHoi(str_replace(">", "&gt;", $h->getTenCauHoi()));
            $h->setPadung(str_replace(">", "&gt;", $h->getPadung()));
            $h->setPasai1(str_replace(">", "&gt;", $h->getPasai1()));
            $h->setPasai2(str_replace(">", "&gt;", $h->getPasai2()));
            $h->setPasai3(str_replace(">", "&gt;", $h->getPasai3()));

            // tạo đáp án
            $count = $i;
            $ran = 0;
            $ran = $dapans[$count];
            if (($i + 1) < 10) $ii = '0' . ($i);
            else $ii = $i;
            if ($ran == 1) {
                $dapan = 'A';
                if (!isset($_POST['cau' . $i])) {

                    $_POST['cau' . $i] = 'null';
                }
                switch ($_POST['cau' . $i]) {
                    case 'A':
                        $cauhoi = new Dethi(

                            $ii,
                            $h->getTenCauHoi(),
                            $h->getPadung(),
                            null,
                            null,
                            null,
                            $h->getImgviauTencauhoi(),
                            null,
                            null,
                            null,
                            null,
                            $_POST['cau' . $i],
                            $dapan
                        );
                        break;
                    case 'B':
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            $h->getPadung(),
                            $h->getPasai1(),
                            null,
                            null,
                            $h->getImgviauTencauhoi(),
                            $h->getImgviaupadung(),
                            $h->getImgviaupasai1(),
                            null,
                            null,
                            $_POST['cau' . $i],
                            $dapan
                        );

                        break;
                    case 'C':
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            $h->getPadung(),
                            null,
                            $h->getPasai2(),
                            null,
                            $h->getImgviauTencauhoi(),
                            $h->getImgviaupadung(),
                            null,
                            $h->getImgviaupasai2(),
                            null,
                            $_POST['cau' . $i],
                            $dapan
                        );
                        break;
                    case 'D':
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            $h->getPadung(),
                            null,
                            null,
                            $h->getPasai3(),
                            $h->getImgviauTencauhoi(),
                            $h->getImgviaupadung(),
                            null,
                            null,
                            $h->getImgviaupasai3(),
                            $_POST['cau' . $i],
                            $dapan
                        );
                        break;
                    default:
                        $cauhoi = new Dethi(

                            $ii,
                            $h->getTenCauHoi(),
                            $h->getPadung(),
                            null,
                            null,
                            null,
                            $h->getImgviauTencauhoi(),
                            null,
                            null,
                            null,
                            null,
                            $_POST['cau' . $i],
                            $dapan
                        );
                        break;
                }
                $bode[] = $cauhoi;
            } elseif ($ran == 2) {
                $dapan = 'B';
                if (!isset($_POST['cau' . $i])) {

                    $_POST['cau' . $i] = 'null';
                }
                switch ($_POST['cau' . $i]) {
                    case 'A':
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            $h->getPasai1(),
                            $h->getPadung(),
                            null,
                            null,
                            $h->getImgviauTencauhoi(),
                            $h->getImgviaupasai1(),
                            $h->getImgviaupadung(),
                            null,
                            null,
                            $_POST['cau' . $i],
                            $dapan
                        );
                        break;
                    case 'B':
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            null,
                            $h->getPadung(),
                            null,
                            null,
                            $h->getImgviauTencauhoi(),
                            null,
                            $h->getImgviaupadung(),
                            null,
                            null,
                            $_POST['cau' . $i],
                            $dapan
                        );
                        break;
                    case 'C':
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            null,
                            $h->getPadung(),
                            $h->getPasai2(),
                            null,
                            $h->getImgviauTencauhoi(),
                            null,
                            $h->getImgviaupadung(),
                            $h->getImgviaupasai2(),
                            null,
                            $_POST['cau' . $i],
                            $dapan
                        );
                        break;
                    case 'D':
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            null,
                            $h->getPadung(),
                            null,
                            $h->getPasai3(),
                            $h->getImgviauTencauhoi(),
                            null,
                            $h->getImgviaupadung(),
                            null,
                            $h->getImgviaupasai3(),
                            $_POST['cau' . $i],
                            $dapan
                        );
                        break;
                    default:
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            null,
                            $h->getPadung(),
                            null,
                            $h->getPasai3(),
                            $h->getImgviauTencauhoi(),
                            null,
                            $h->getImgviaupadung(),
                            null,
                            $h->getImgviaupasai3(),
                            $_POST['cau' . $i],
                            $dapan
                        );
                        break;
                }
                $bode[] = $cauhoi;
            } elseif ($ran == 3) {
                $dapan = 'C';
                if (!isset($_POST['cau' . $i])) {

                    $_POST['cau' . $i] = 'null';
                }
                switch ($_POST['cau' . $i]) {
                    case 'A':
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            $h->getPasai1(),
                            null,
                            $h->getPadung(),
                            null,
                            $h->getImgviauTencauhoi(),
                            $h->getImgviaupasai1(),
                            null,
                            $h->getImgviaupadung(),
                            null,
                            $_POST['cau' . $i],
                            $dapan
                        );
                        break;
                    case 'B':
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            null,
                            $h->getPasai2(),
                            $h->getPadung(),
                            null,
                            $h->getImgviauTencauhoi(),
                            null,
                            $h->getImgviaupasai2(),
                            $h->getImgviaupadung(),
                            null,
                            $_POST['cau' . $i],
                            $dapan
                        );

                        break;
                    case 'C':
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            null,
                            null,
                            $h->getPadung(),
                            null,
                            $h->getImgviauTencauhoi(),
                            null,
                            null,
                            $h->getImgviaupadung(),
                            null,
                            $_POST['cau' . $i],
                            $dapan
                        );
                        break;
                    case 'D':
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            null,
                            null,
                            $h->getPadung(),
                            $h->getPasai3(),
                            $h->getImgviauTencauhoi(),
                            null,
                            null,
                            $h->getImgviaupadung(),
                            $h->getImgviaupasai3(),
                            $_POST['cau' . $i],
                            $dapan
                        );
                        break;
                    default:
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            null,
                            null,
                            $h->getPadung(),
                            null,
                            $h->getImgviauTencauhoi(),
                            null,
                            null,
                            $h->getImgviaupadung(),
                            null,
                            $_POST['cau' . $i],
                            $dapan
                        );
                        break;
                }
                $bode[] = $cauhoi;
            } elseif ($ran == 4) {
                $dapan = 'D';
                if (!isset($_POST['cau' . $i])) {

                    $_POST['cau' . $i] = 'null';
                }
                switch ($_POST['cau' . $i]) {
                    case 'A':
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            $h->getPasai1(),
                            null,
                            null,
                            $h->getPadung(),
                            $h->getImgviauTencauhoi(),
                            $h->getImgviaupasai1(),
                            null,
                            null,
                            $h->getImgviaupadung(),
                            $_POST['cau' . $i],
                            $dapan
                        );
                        break;
                    case 'B':
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            null,
                            $h->getPasai2(),
                            null,
                            $h->getPadung(),
                            $h->getImgviauTencauhoi(),
                            null,
                            $h->getImgviaupasai2(),
                            null,
                            $h->getImgviaupadung(),
                            $_POST['cau' . $i],
                            $dapan
                        );

                        break;
                    case 'C':
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            null,
                            null,
                            $h->getPasai3(),
                            $h->getPadung(),
                            $h->getImgviauTencauhoi(),
                            null,
                            null,
                            $h->getImgviaupasai3(),
                            $h->getImgviaupadung(),
                            $_POST['cau' . $i],
                            $dapan
                        );
                        break;
                    case 'D':
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            null,
                            null,
                            null,
                            $h->getPadung(),
                            $h->getImgviauTencauhoi(),
                            null,
                            null,
                            null,
                            $h->getImgviaupadung(),
                            $_POST['cau' . $i],
                            $dapan
                        );
                        $bode[] = $cauhoi;
                        break;
                    default:
                        $cauhoi = new Dethi(
                            $ii,
                            $h->getTenCauHoi(),
                            null,
                            null,
                            null,
                            $h->getPadung(),
                            $h->getImgviauTencauhoi(),
                            null,
                            null,
                            null,
                            $h->getImgviaupadung(),
                            $_POST['cau' . $i],
                            $dapan
                        );
                        break;
                }
                $bode[] = $cauhoi;
            }
            $i++;
        }

        // print_r($bode);
        require_once 'views/exam/client/report.php';
    }
}
