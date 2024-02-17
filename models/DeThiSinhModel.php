<?php

class DeThiSinh
{
    // Thuộc tính
    public $sbd;
    public $macauhoi;
    public $socau;
    public $padung;
    public $pachon;
    public $temp;
    public $mamodun;

    // Hàm khởi tạo
    public function __construct($sbd, $macauhoi, $socau, $padung, $pachon, $temp, $mamodun)
    {
        $this->sbd = $sbd;
        $this->macauhoi = $macauhoi;
        $this->socau = $socau;
        $this->padung = $padung;
        $this->pachon = $pachon;
        $this->temp = $temp;
        $this->mamodun = $mamodun;
    }

    // Phương thức Getter cho sbd
    public function getSbd()
    {
        return $this->sbd;
    }

    // Phương thức Setter cho sbd
    public function setSbd($sbd)
    {
        $this->sbd = $sbd;
    }

    // Phương thức Getter cho macauhoi
    public function getMacauhoi()
    {
        return $this->macauhoi;
    }

    // Phương thức Setter cho macauhoi
    public function setMacauhoi($macauhoi)
    {
        $this->macauhoi = $macauhoi;
    }

    // Phương thức Getter cho socau
    public function getSocau()
    {
        return $this->socau;
    }

    // Phương thức Setter cho socau
    public function setSocau($socau)
    {
        $this->socau = $socau;
    }

    // Phương thức Getter cho padung
    public function getPadung()
    {
        return $this->padung;
    }

    // Phương thức Setter cho padung
    public function setPadung($padung)
    {
        $this->padung = $padung;
    }

    // Phương thức Getter cho pachon
    public function getPachon()
    {
        return $this->pachon;
    }

    // Phương thức Setter cho pachon
    public function setPachon($pachon)
    {
        $this->pachon = $pachon;
    }

    // Phương thức Getter cho temp
    public function getTemp()
    {
        return $this->temp;
    }

    // Phương thức Setter cho temp
    public function setTemp($temp)
    {
        $this->temp = $temp;
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
