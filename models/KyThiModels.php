<?php

class KyThi
{
    // Thuộc tính
    public $makythi;
    public $tenkythi;
    public $tgbatdua;
    public $tgketthuc;

    // Hàm khởi tạo
    public function __construct($makythi, $tenkythi, $tgbatdua, $tgketthuc)
    {
        $this->makythi = $makythi;
        $this->tenkythi = $tenkythi;
        $this->tgbatdua = $tgbatdua;
        $this->tgketthuc = $tgketthuc;
    }

    // Phương thức Getter cho makythi
    public function getMakythi()
    {
        return $this->makythi;
    }

    // Phương thức Setter cho makythi
    public function setMakythi($makythi)
    {
        $this->makythi = $makythi;
    }

    // Phương thức Getter cho tenkythi
    public function getTenkythi()
    {
        return $this->tenkythi;
    }

    // Phương thức Setter cho tenkythi
    public function setTenkythi($tenkythi)
    {
        $this->tenkythi = $tenkythi;
    }

    // Phương thức Getter cho tgbatdua
    public function getTgbatdua()
    {
        return $this->tgbatdua;
    }

    // Phương thức Setter cho tgbatdua
    public function setTgbatdua($tgbatdua)
    {
        $this->tgbatdua = $tgbatdua;
    }

    // Phương thức Getter cho tgketthuc
    public function getTgketthuc()
    {
        return $this->tgketthuc;
    }

    // Phương thức Setter cho tgketthuc
    public function setTgketthuc($tgketthuc)
    {
        $this->tgketthuc = $tgketthuc;
    }
}
