<?php
include './include.php';

class router
{
    private $loginController;
    private $homeController;
    private $examController;
    private $quanlymonthiController;
    private $quanlythisinhController;
    private $soandethiController;
    private $phanquyenthiController;
    private $soancautrucdeController;
    private $diemthiController;
    public function __construct()
    {
        $this->loginController = new LoginController();
        $this->homeController = new HomeController();
        $this->examController = new ExamController();
        $this->quanlymonthiController = new QuanlyMonthiController();
        $this->quanlythisinhController = new QuanLyThiSinhController();
        $this->soandethiController = new SoandethiController();
        $this->phanquyenthiController = new PhanQuyenThiController();
        $this->soancautrucdeController = new SoancautrucdeController();
        $this->diemthiController = new DiemthiController();
    }
    public function route()
    {
        $controller = $_GET['controller'] ?? 'login';
        switch ($controller) {
            case 'login':
                $this->loginController->index();
                break;
            case 'loginAdmin':
                $this->loginController->login();
                break;
            case 'logout':
                $this->loginController->logout();
                break;
            case 'home':
                $this->homeController->index();
                break;
            case 'setupExam':
                $this->examController->index();
                break;
            case 'exam':
                $this->examController->exam();
                break;
            case 'updateTemp':
                $this->examController->updateTemp();
                break;
            case 'UpdateTime':
                $this->examController->updateTime();
                break;
            case 'UpdateTimeEnd':
                $this->examController->updateTimeEnd();
                break;
            case 'reportExam':
                $this->examController->submitExam();
                break;
            case 'homeAdmin':
                $this->homeController->index();
                break;
            case 'getDataAPI':
                $this->homeController->getDataAPI();
                break;
            case 'updateKyThi':
                $this->homeController->updateKyThi();
                break;
            case 'createKyThi':
                $this->homeController->createKyThi();
                break;
            case 'deleteKyThi':
                $this->homeController->deleteKyThi();
                break;
            case 'quanlymonthi':
                $this->quanlymonthiController->index();
                break;
            case 'getmonthi':
                $this->quanlymonthiController->getmonthi();
                break;
            case 'deletemonthi':
                $this->quanlymonthiController->deletemonthi();
                break;
            case 'getnoidungthi':
                $this->quanlymonthiController->getnoidungthi();
                break;
            case 'addnoidungthi':
                $this->quanlymonthiController->addnoidungthi();
                break;
            case 'fixnoidungthi':
                $this->quanlymonthiController->fixnoidungthi();
                break;
            case 'deletenoidungthi':
                $this->quanlymonthiController->deletenoidungthi();
                break;
            case 'quanlythisinh':
                $this->quanlythisinhController->index();
                break;
            case 'getphongthi':
                $this->quanlythisinhController->getphongthi();
                break;
            case 'getthisinh':
                $this->quanlythisinhController->getthisinh();
                break;
            case 'createthisinh':

                $this->quanlythisinhController->createthisinh();
                break;
            case 'createthisinhByexcel':
                $this->quanlythisinhController->createthisinhByexcel();
                break;
            case 'createthisinhByExcelAddDatabase':
                $this->quanlythisinhController->createthisinhByExcelAddDatabase();
                break;
            case 'deletethisinh':
                $this->quanlythisinhController->deletethisinh();
                break;
            case 'updatethisinh':
                $this->quanlythisinhController->updatethisinh();
                break;
            case 'dlpassword':
                $this->quanlythisinhController->renderfieexl();
                break;
            case 'soandethi':
                $this->soandethiController->index();
                break;
            case 'getcauhoibybode':
                $this->soandethiController->getcauhoibybode();
                break;
            case 'createcauhoi':
                $this->soandethiController->createcauhoi();
                break;
            case 'updatecauhoi':
                $this->soandethiController->updatecauhoi();
                break;
            case 'deletecauhoi':
                $this->soandethiController->deletecauhoi();
                break;
            case 'soancautrucde':
                $this->soancautrucdeController->index();
                break;
            case 'gettimeandnumber':
                $this->soancautrucdeController->gettimeandnumber();
                break;
            case 'diemthi':
                $this->diemthiController->index();
                break;
            case 'getdiem':
                $this->diemthiController->getdiem();
                break;
            case 'chitietbaithi':
                require_once 'views/diemthi/admin/chitietbaithi.php';
                break;
            case 'phanquyenthi':
                $this->phanquyenthiController->index();
                break;
            case 'updatequyenthi':
                $this->phanquyenthiController->updatequyenthi();
                break;
            case 'getthisinhbymonthis':
                $this->phanquyenthiController->getthisinhbymonthis();
                break;
            case 'tinhtrangthi':
                require_once 'views/tinhtrangthi/admin/tinhtrangthi.php';
                break;
            default:

                echo '404 not found';
                break;
        }
    }
}
$router = new router();
$router->route();
