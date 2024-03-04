<?php
require_once './dao/diemDAO.php';
class DiemThiController
{
    private $adminDAO;
    private $dienthiDAO;
    public function __construct()
    {
        $this->adminDAO = new AdminDAO();
        $this->dienthiDAO = new DiemDAO();
    }
    public function index()
    {
        $kythi = $this->adminDAO->getKythi();
        require_once 'views/diemthi/admin/diemthi.php';
    }
    public function getdiem()
    {
        $data = json_decode(file_get_contents("php://input"));
        $thisinh = $this->dienthiDAO->getall($data->phong, $data->kythi);
        echo json_encode($thisinh, JSON_UNESCAPED_UNICODE);
    }
}
