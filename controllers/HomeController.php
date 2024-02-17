<?php
include './dao/ExamDAO.php';
require_once './dao/admin.php';
class HomeController
{
    private $examDAO;
    private $adminDAO;
    public function __construct()
    {
        $this->examDAO = new ExamDAO();
        $this->adminDAO = new AdminDAO();
    }
    public function index()
    {
        if (!isset($_SESSION['user_info']['sbd'])) {
            if (!isset($_SESSION['admin'])) {
                header('Location: index.php');
                exit();
            } else {
                $kythi = $this->adminDAO->getKythi();
                require_once 'views/home/admin/home.php';
                die();
            }
        };
        $moduns = $this->examDAO->getModun($_SESSION['user_info']['sbd']);
        $target = "assets/upload/imgthisinh/" . $this->examDAO->getProfile($_SESSION['user_info']['sbd']);
        require_once 'views/home/client/monthi.php';
    }
}
