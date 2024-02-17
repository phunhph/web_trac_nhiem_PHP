<?php
include './include.php';

class router
{
    private $loginController;
    private $homeController;
    private $examController;

    public function __construct()
    {
        $this->loginController = new LoginController();
        $this->homeController = new HomeController();
        $this->examController = new ExamController();
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
            case 'homeAdmin':
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
            default:

                echo '404 not found';
                break;
        }
    }
}
$router = new router();
$router->route();
