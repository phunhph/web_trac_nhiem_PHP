<?php
require_once 'dao/thoigianthiDAO.php';
class SoanCauTrucDeController
{
    private $adminDAO;
    private $thoigianthiDAO;
    private $quanlymonthiDAO;
    public function __construct()
    {
        $this->adminDAO = new AdminDAO();
        $this->thoigianthiDAO = new thoigianthiDAO();
        $this->quanlymonthiDAO = new QuanLyMonThiDAO();
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
    public function getmodule()
    {
        $data = json_decode(file_get_contents("php://input"));
        $bode = $this->quanlymonthiDAO->getmobodevaten($data->id);
        $result = array(); // Initialize result array

        foreach ($bode as $key => $value) {
            $thongcau = $this->quanlymonthiDAO->demcauhoi($value->mabode);
            $profile = $this->quanlymonthiDAO->getdethiprofile($value->mabode);

            // Merge data into a single associative array
            $result[] = array(
                'mabode' => $value->mabode,
                'tenbode' => $value->tenbode,
                'tongcau' => $thongcau,
                'profile' => $profile
            );
        }
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    public function updatecautrucde()
    {
        $data = json_decode(file_get_contents("php://input"));
        $tms = $this->thoigianthiDAO->getTimeAndNumber($data->mamonthi);
        if ($tms == []) {
            $this->thoigianthiDAO->createTimeAndNumber($data->mamonthi, $data->thoigian, $data->solong);
        } else {
            $this->thoigianthiDAO->updateTimeAndNumber($data->mamonthi, $data->thoigian, $data->solong);
        }

        $this->quanlymonthiDAO->deletedethiprofile($data->mamonthi);

        $i = 1;
        foreach ($data->dataupdate as $key => $value) {
            $tms = $value->modunmd;
            $parts = explode("~", $tms);
            $mucdo = end($parts);
            $mamodun = reset($parts);
            $id = $data->mamonthi . "-" . $i;
            $this->quanlymonthiDAO->craetedethiprofile($id, $mamodun, $mucdo, $value->soluong, $data->mamonthi);
            $i++;
        }
    }
}
