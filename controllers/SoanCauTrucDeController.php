<?php
require_once './dao/thoigianthiDAO.php';
class SoanCauTrucDeController
{
    private $adminDAO;
    private $thoigianthiDAO;
    public function __construct()
    {
        $this->adminDAO = new AdminDAO();
        $this->thoigianthiDAO = new thoigianthiDAO();
    }
    public function index()
    {
        $kythi = $this->adminDAO->getKythi();
        require_once 'views/soancautrucde/admin/soancautrucde.php';
    }
    public function gettimeandnumber()
    {
        $data = json_decode(file_get_contents("php://input"));
        $tms = $this->thoigianthiDAO->getTimeAndNumber($data->id);
        echo json_encode($tms, JSON_UNESCAPED_UNICODE);
    }
}
