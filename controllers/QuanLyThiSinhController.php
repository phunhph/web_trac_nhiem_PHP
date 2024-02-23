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
    }
    public function deletethisinh()
    {
    }
    public function updatethisinh()
    {
    }
}
