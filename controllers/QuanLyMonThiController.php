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
    public function addmonthi()
    {
        $data = json_decode(file_get_contents("php://input"));
        $this->quanlymonDao->createMonThi($data->id, $data->name, $data->tgbd, $data->tgkt, $data->id_kt);
        exit();
    }
    public function fixmonthi()
    {
        $data = json_decode(file_get_contents("php://input"));
        $this->quanlymonDao->fixmonthi($data->id, $data->name, $data->tgbd, $data->tgkt); //;
        exit();
    }
    public function deletemonthi()
    {
        $data = json_decode(file_get_contents("php://input"));

        $this->quanlymonDao->deletediem($data->id);
        $this->quanlymonDao->deleteallowexam($data->id);
        $this->quanlymonDao->deleteremote($data->id);
        $this->quanlymonDao->deletedethisinh($data->id);
        $this->quanlymonDao->deletecauhoi($data->id);
        $this->quanlymonDao->deletebode($data->id);
        $this->quanlymonDao->deletedethiprofilebymodun($data->id);
        $this->quanlymonDao->deletethoigianthi($data->id);
        $this->quanlymonDao->deleteMonThi($data->id); //;
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
    public function addnoidungthi()
    {
        $data = json_decode(file_get_contents("php://input"));
        $this->quanlymonDao->createNoiDungThi($data->id, $data->name, $data->mamon); //;
        exit();
    }
    public function fixnoidungthi()
    {
        $data = json_decode(file_get_contents("php://input"));
        $this->quanlymonDao->fixNoiDungThi($data->id, $data->name, $data->mamon); //;
        exit();
    }
    public function deletenoidungthi()
    {
        $data = json_decode(file_get_contents("php://input"));
        $this->quanlymonDao->deletedethisinhbymabode($data->id);
        $this->quanlymonDao->deletecauhoibymabode($data->id);
        $this->quanlymonDao->deleteNoiDungThi($data->id); //;
        exit();
    }
}
