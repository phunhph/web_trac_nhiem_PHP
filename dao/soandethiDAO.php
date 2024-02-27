<?php
require_once 'models/CauhoiModel.php';
require_once 'models/BodeModel.php';
class SoanDeThiDAO
{
    private $db;
    public function __construct()
    {
        $dbConnection = new DatabaseConnection();
        $this->db = $dbConnection->getConnection();
    }

    public function getcauhoi($mabode)
    {

        $sql = "SELECT * FROM `cauhoi` WHERE `mabode` = :mabode";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':mabode', $mabode);
        $stmt->execute();

        $cauhois = array();

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $cauhoi = new CauHoi(
                $row->macauhoi,
                $row->tencauhoi,
                $row->padung,
                $row->pasai1,
                $row->pasai2,
                $row->pasai3,
                $row->imgviauTencauhoi,
                $row->imgviauPadung,
                $row->imgviauPasai1,
                $row->imgviauPasai2,
                $row->imgviauPasai3,
                $row->mucdo,
                $row->mabode
            );
            $cauhois[] = $cauhoi;
        }
        return $cauhois;
    }

    public function getbode()
    {
    }
}
