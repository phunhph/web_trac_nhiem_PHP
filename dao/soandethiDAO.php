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
    public function createcauhoi($macauhoi, $tencauhoi, $padung, $pasai1, $pasai2, $pasai3, $mucdo, $mabode)
    {
        $sql = "INSERT INTO cauhoi (macauhoi, tencauhoi, padung, pasai1, pasai2, pasai3, mucdo, mabode)
            VALUES (:macauhoi, :tencauhoi, :padung, :pasai1, :pasai2, :pasai3, :mucdo, :mabode)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':macauhoi', $macauhoi);
        $stmt->bindParam(':tencauhoi', $tencauhoi);
        $stmt->bindParam(':padung', $padung);
        $stmt->bindParam(':pasai1', $pasai1);
        $stmt->bindParam(':pasai2', $pasai2);
        $stmt->bindParam(':pasai3', $pasai3);
        $stmt->bindParam(':mucdo', $mucdo);
        $stmt->bindParam(':mabode', $mabode);
        $stmt->execute();
    }

    public function updatecauhoi($macauhoi, $tencauhoi, $padung, $pasai1, $pasai2, $pasai3, $mucdo)
    {
        $sql = "UPDATE cauhoi 
            SET tencauhoi = :tencauhoi, padung = :padung, pasai1 = :pasai1, pasai2 = :pasai2, pasai3 = :pasai3, mucdo = :mucdo
            WHERE macauhoi = :macauhoi";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':macauhoi', $macauhoi);
        $stmt->bindParam(':tencauhoi', $tencauhoi);
        $stmt->bindParam(':padung', $padung);
        $stmt->bindParam(':pasai1', $pasai1);
        $stmt->bindParam(':pasai2', $pasai2);
        $stmt->bindParam(':pasai3', $pasai3);
        $stmt->bindParam(':mucdo', $mucdo);
        $stmt->execute();
    }

    public function deletecauhoi($macauhoi)
    {
        $sql = "DELETE FROM cauhoi WHERE macauhoi = :macauhoi";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':macauhoi', $macauhoi);
        $stmt->execute();
    }

    public function deletedethisinh($macauhoi)
    {
        $sql = "DELETE FROM dethisinh WHERE macauhoi = :macauhoi";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':macauhoi', $macauhoi);
        $stmt->execute();
    }

    public function getbode()
    {
    }
}
