<?php
require_once 'dao/ExamDAO.php';
require_once 'dao/admin.php';
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

        if (!isset($_SESSION['user_info'])) {
            if (!isset($_SESSION['admin'])) {
                header('Location: index.php');
                exit();
            } else {
                $kythi = $this->adminDAO->getKythi();
                require_once 'views/home/admin/home.php';
            }
        } else {
            $moduns = $this->examDAO->getModun($_SESSION['user_info']['sbd']);
            $target = "assets/upload/imgthisinh/" . $this->examDAO->getProfile($_SESSION['user_info']['sbd']);
            require_once 'views/home/client/monthi.php';
        }
    }
    public function getDataAPI()
    {
        $kythi = $this->adminDAO->getKythi();
        echo json_encode($kythi, JSON_UNESCAPED_UNICODE);
        exit();
    }
    public function updateKyThi()
    {
        // Nhận dữ liệu từ phía front-end
        $data = json_decode(file_get_contents("php://input"));
        $this->adminDAO->updateKythi($data->makythi, $data->tgbatdua, $data->tgketthuc);
        exit();
    }
    public function createKyThi()
    {
        // Nhận dữ liệu từ phía front-end
        $data = json_decode(file_get_contents("php://input"));
        $this->adminDAO->createKyThi($data->makythi, $data->tenkythi, $data->tgbatdua, $data->tgketthuc);
        exit();
    }

    public function deleteKyThi()
    {
        $data = json_decode(file_get_contents("php://input"));
        $this->adminDAO->deleteKyThi($data->id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit();
    }
}
