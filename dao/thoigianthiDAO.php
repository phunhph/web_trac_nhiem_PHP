<?php

class thoigianthiDAO
{
    private $db;
    public function __construct()
    {
        $dbConnection = new DatabaseConnection();
        $this->db = $dbConnection->getConnection();
    }

    public function getTimeAndNumber($monthi)
    {
        $query = "SELECT tgthi, tongcauhoi FROM thoigianthi WHERE mamodun=:monthi";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':monthi', $monthi, PDO::PARAM_STR);
        $stmt->execute();

        $phongs = array();

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $phongs[] = $row;
        }

        return $phongs;
    }

    public function updateTimeAndNumber($monthi, $tgthi, $tongcauhoi)
    {
        $query = "UPDATE `thoigianthi` SET `tongcauhoi`=:tongcauhoi, `tgthi`=:tgthi WHERE `mamodun`=:monthi";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tongcauhoi', $tongcauhoi, PDO::PARAM_INT);
        $stmt->bindParam(':tgthi', $tgthi, PDO::PARAM_STR);
        $stmt->bindParam(':monthi', $monthi, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function createTimeAndNumber($monthi, $tgthi, $tongcauhoi)
    {
        $query = "INSERT INTO `thoigianthi`(`mamodun`, `tongcauhoi`, `tgthi`) VALUES (:monthi, :tongcauhoi, :tgthi)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':monthi', $monthi, PDO::PARAM_STR);
        $stmt->bindParam(':tongcauhoi', $tongcauhoi, PDO::PARAM_INT);
        $stmt->bindParam(':tgthi', $tgthi, PDO::PARAM_STR);
        $stmt->execute();
    }
}
