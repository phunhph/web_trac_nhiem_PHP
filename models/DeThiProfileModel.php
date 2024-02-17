<?php

class DeThiProfile
{
    // Thuộc tính

    public $cauhoi;
    public $pmucdo;
    public $soluong;
    public $mamodun;

    // Hàm khởi tạo
    public function __construct($cauhoi, $pmucdo, $soluong, $mamodun)
    {

        $this->cauhoi = $cauhoi;
        $this->pmucdo = $pmucdo;
        $this->soluong = $soluong;
        $this->mamodun = $mamodun;
    }
    // Phương thức Getter cho cauhoi
    public function getCauhoi()
    {
        return $this->cauhoi;
    }

    // Phương thức Setter cho cauhoi
    public function setCauhoi($cauhoi)
    {
        $this->cauhoi = $cauhoi;
    }

    // Phương thức Getter cho pmucdo
    public function getPmucdo()
    {
        return $this->pmucdo;
    }

    // Phương thức Setter cho pmucdo
    public function setPmucdo($pmucdo)
    {
        $this->pmucdo = $pmucdo;
    }

    // Phương thức Getter cho soluong
    public function getSoluong()
    {
        return $this->soluong;
    }

    // Phương thức Setter cho soluong
    public function setSoluong($soluong)
    {
        $this->soluong = $soluong;
    }

    // Phương thức Getter cho mamodun
    public function getMamodun()
    {
        return $this->mamodun;
    }

    // Phương thức Setter cho mamodun
    public function setMamodun($mamodun)
    {
        $this->mamodun = $mamodun;
    }
}
