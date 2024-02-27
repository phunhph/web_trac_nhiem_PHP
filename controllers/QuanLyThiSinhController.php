<?php
require_once 'dao/quanlythisinhDAO.php';
class QuanLyThiSinhController
{
    private $adminDAO;
    private $quanlythisinhDAO;
    public function __construct()
    {

        $this->adminDAO = new AdminDAO();
        $this->quanlythisinhDAO = new QuanlyThiSinhDAO();
    }
    public function index()
    {
        $kythi = $this->adminDAO->getKythi();
        require_once 'views/quanlythisinh/admin/quanlythisinh.php';
    }
    public function getphongthi()
    {
        $data = json_decode(file_get_contents("php://input"));
        $phongthis = $this->quanlythisinhDAO->getPhong($data->id); //;
        echo json_encode($phongthis, JSON_UNESCAPED_UNICODE);
        exit();
    }
    public function getthisinh()
    {
        $data = json_decode(file_get_contents("php://input"));
        $hocviens = $this->quanlythisinhDAO->getThiSinh($data->makythi, $data->tenphong); //;
        echo json_encode($hocviens, JSON_UNESCAPED_UNICODE);
        exit();
    }
    public function createthisinh()
    {
        $matkhau = "N";
        $i = 1;
        while ($i <= 7) //Tạo mật khẩu gồm 8 kí tự chữ số
        {
            $matkhau .= rand(0, 9);
            $i++;
        }
        $tempmk = $matkhau;
        $matkhau = md5($matkhau);
        $data = json_decode(file_get_contents("php://input"));

        $result = $this->quanlythisinhDAO->getThiSinhById($data->sbd);
        $donvi  = $this->quanlythisinhDAO->getMaDonVi($data->madonvi);
        if ($donvi) {
            if ($result) {
            } else {
                $this->quanlythisinhDAO->createThiSinh($data->sbd, $data->hodem, $data->ten, $data->ngaysinh, $data->noisinh, $data->kythi, $data->madonvi, $data->phongthi, $matkhau, null);
                $this->quanlythisinhDAO->createMatKhau($data->sbd, $tempmk);
                $mamodun = $this->quanlythisinhDAO->getMaMoDun($data->kythi);

                foreach ($mamodun as $key => $value) {
                    $this->quanlythisinhDAO->createAlowexam($data->sbd, $value);
                }
            }
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
            exit();
        } else {
            $this->quanlythisinhDAO->createMaDonVi($data->madonvi, $data->tendonvi);
            if ($result) {
            } else {
                $this->quanlythisinhDAO->createThiSinh($data->sbd, $data->hodem, $data->ten, $data->ngaysinh, $data->noisinh, $data->kythi, $data->madonvi, $data->phongthi, $matkhau, null);
                $this->quanlythisinhDAO->createMatKhau($data->sbd, $tempmk);
                $mamodun = $this->quanlythisinhDAO->getMaMoDun($data->kythi);

                foreach ($mamodun as $key => $value) {
                    $this->quanlythisinhDAO->createAlowexam($data->sbd, $value);
                }
            }
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
            exit();
        }
    }
    public function deletethisinh()
    {
        $data = json_decode(file_get_contents("php://input"));
        str_replace("'", "&#39;", $data->sbd);
        str_replace("'", "&#39;", $data->kythi);
        $this->quanlythisinhDAO->deleteRemote($data->sbd);
        $this->quanlythisinhDAO->deleteAllowexam($data->sbd);
        $this->quanlythisinhDAO->deleteDiem($data->sbd);
        $this->quanlythisinhDAO->deleteMatKhau($data->sbd);
        $this->quanlythisinhDAO->deleteDeThiSinh($data->sbd);
        $this->quanlythisinhDAO->deleteThiSinh($data->sbd);
    }
    public function updatethisinh()
    {
        $matkhau = "N";
        $i = 1;
        while ($i <= 7) //Tạo mật khẩu gồm 8 kí tự chữ số
        {
            $matkhau .= rand(0, 9);
            $i++;
        }
        $tempmk = $matkhau;
        $matkhau = md5($matkhau);
        $data = json_decode(file_get_contents("php://input"));
        $donvi  = $this->quanlythisinhDAO->getMaDonVi($data->madonvi);
        $result = $this->quanlythisinhDAO->getThiSinhById($data->sbd);
        if ($result) {
            if ($donvi) {
                $this->quanlythisinhDAO->updateThiSinh($data->sbd, $data->hodem, $data->ten, $data->ngaysinh, $data->noisinh, $data->kythi, $data->madonvi, $data->phongthi, $matkhau, null);
                $this->quanlythisinhDAO->updateMatKhau($data->sbd, $tempmk);
            } else {
                $this->quanlythisinhDAO->createMaDonVi($data->madonvi, $data->tendonvi);
                $this->quanlythisinhDAO->updateThiSinh($data->sbd, $data->hodem, $data->ten, $data->ngaysinh, $data->noisinh, $data->kythi, $data->madonvi, $data->phongthi, $matkhau, null);
                $this->quanlythisinhDAO->updateMatKhau($data->sbd, $tempmk);
            }
        }
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}
