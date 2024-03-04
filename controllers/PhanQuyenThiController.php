<?php
class PhanQuyenThiController
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
        require_once 'views/phanquyenthisinh/admin/phanquyenthisinh.php';
    }
    public function getthisinhbymonthis()
    {
        $data = json_decode(file_get_contents("php://input"));
        $thisinh = $this->quanlythisinhDAO->getthisinhbymonthis($data->id, $data->hienthi); //;
        echo json_encode($thisinh, JSON_UNESCAPED_UNICODE);
        exit();
    }
    public function updatequyenthi()
    {
        $data = json_decode(file_get_contents("php://input"));
        $thi = $data->id;
        $huy = $data->ud;
        if (count($thi)) {
            foreach ($thi as $key => $value) {
                $this->quanlythisinhDAO->updatethi($value->sbd, $value->kythi);
            }
        }
        if (count($huy)) {
            foreach ($huy as $key => $value) {
                $this->quanlythisinhDAO->updatehuy($value->sbd, $value->kythi);
            }
        }

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}
