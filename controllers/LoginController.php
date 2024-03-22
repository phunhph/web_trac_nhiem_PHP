<?php
require_once 'dao/LoginDAO.php';
class LoginController
{
    private $loginDAO;
    public function __construct()
    {
        $this->loginDAO = new LoginDAO();
    }
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->loginDAO->login($_POST['username'], $_POST['password']);
            if (isset($user)) {
                if (strtotime($user->getTgbatdau()) > time()) {
                    $acstion = "notstart";
                } else if (strtotime($user->getTgketthuc()) < time()) {
                    // $acstion = "stop";
                    $_SESSION['user_info'] = array(
                        'sbd' => $user->getSbd(),
                        'hodem' => $user->getHodem(),
                        'ten' => $user->getTen(),
                        'ngaysinh' => $user->getNgaysinh(),
                        'noisinh' => $user->getNoisinh(),
                        'madonvi' => $user->getMadonvi()
                    );
                    $acstion = "true";
                } else if (strtotime($user->getTgbatdau()) <= time() && strtotime($user->getTgketthuc()) >= time()) {
                    $_SESSION['user_info'] = array(
                        'sbd' => $user->getSbd(),
                        'hodem' => $user->getHodem(),
                        'ten' => $user->getTen(),
                        'ngaysinh' => $user->getNgaysinh(),
                        'noisinh' => $user->getNoisinh(),
                        'madonvi' => $user->getMadonvi()
                    );

                    $acstion = "true";
                }
            } else {
                $acstion = 'false';
            }
            header('location: index.php?controller=login&action=' . $acstion);
            exit();
        } else {
            if (isset($_GET['action'])) {
            } else {
                session_unset();
            }
            require_once 'views/login/login.php';
        }
    }
    public function login()
    {

        if ($_POST) {
            $tk = $_POST['taikhoan'];
            $matkhau = $_POST['matkhau'];

            if ($tk == "" || $matkhau == "") {
                header('location: index.php');
                exit();
            }

            $user = $this->loginDAO->loginAdmin($tk, $matkhau);
            if ($user) {
                $_SESSION["admin"] = $user;
                header('location: index.php?controller=homeAdmin');
                exit();
            } else {
                header('location: index.php');
                exit();
            }
        }
    }
    public function logout()
    {
        echo "login view";
    }
}
