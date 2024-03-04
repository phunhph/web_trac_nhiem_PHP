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
}
