<?php
require_once 'dao/quanlymonthiDAO.php';
class QuanLyMonThiController
{
    private $quanlymonDao;
    private $adminDAO;
    public function __construct()
    {
        $this->quanlymonDao = new QuanLyMonThiDAO();
        $this->adminDAO = new AdminDAO();
    }
    public function index()
    {
        $kythi = $this->adminDAO->getNameKyThi();
        require_once 'views/quanlymonthi/admin/quanlymonthi.php';
    }
    // môn thi
    public function getmonthi()
    {
        $id = json_decode(file_get_contents("php://input"));
        $monthi = $this->quanlymonDao->getMonthi($id->id); //;
        echo json_encode($monthi, JSON_UNESCAPED_UNICODE);
        exit();
    }
    // nội dung thi
    public function getnoidungthi()
    {
        $id = json_decode(file_get_contents("php://input"));

        $noidungthi = $this->quanlymonDao->getNoiDungThi($id->id); //;
        echo json_encode($noidungthi, JSON_UNESCAPED_UNICODE);
        exit();
    }
}
