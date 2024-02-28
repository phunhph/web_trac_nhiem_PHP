<?php
require_once 'dao/soandethiDAO.php';
class SoanDeThiController
{
    private $adminDAO;
    private $soandethiDAO;
    public function __construct()
    {
        $this->adminDAO = new AdminDAO();
        $this->soandethiDAO = new SoanDeThiDAO();
    }
    public function index()
    {
        $kythi = $this->adminDAO->getKythi();
        require_once 'views/soandethi/admin/soandethi.php';
    }
    public function getcauhoibybode()
    {
        $data = json_decode(file_get_contents("php://input"));
        $cauhois = $this->soandethiDAO->getcauhoi($data->id); //;
        echo json_encode($cauhois, JSON_UNESCAPED_UNICODE);
        exit();
    }
    public function deletecauhoi()
    {
        $data = json_decode(file_get_contents("php://input"));
        $this->soandethiDAO->deletedethisinh($data->macauhoi);
        $this->soandethiDAO->deletecauhoi($data->macauhoi); //;
        exit();
    }
    public function updatecauhoi()
    {
        $data = json_decode(file_get_contents("php://input"));
        $this->soandethiDAO->updatecauhoi($data->macauhoi, $data->tencauhoi, $data->padung, $data->pasai1, $data->pasai2, $data->pasai3, $data->tl);
        exit();
    }
    public function createcauhoi()
    {
        $data = json_decode(file_get_contents("php://input"));
        $this->soandethiDAO->createcauhoi($data->macauhoi, $data->tencauhoi, $data->padung, $data->pasai1, $data->pasai2, $data->pasai3, $data->tl, $data->mabode); //;
        exit();
    }
}
