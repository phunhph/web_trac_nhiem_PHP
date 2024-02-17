<?php

class Login
{
    // Thuộc tính
    public $sbd;
    public $hodem;
    public $ten;
    public $ngaysinh;
    public $noisinh;
    public $madonvi;
    public $tgbatdau;
    public $tgketthuc;

    // Hàm khởi tạo
    public function __construct($sbd, $hodem, $ten, $ngaysinh, $noisinh, $madonvi, $tgbatdau, $tgketthuc)
    {
        $this->sbd = $sbd;
        $this->hodem = $hodem;
        $this->ten = $ten;
        $this->ngaysinh = $ngaysinh;
        $this->noisinh = $noisinh;
        $this->madonvi = $madonvi;
        $this->tgbatdau = $tgbatdau;
        $this->tgketthuc = $tgketthuc;
    }

    // Getter và Setter cho sbd
    public function getSbd()
    {
        return $this->sbd;
    }

    public function setSbd($sbd)
    {
        $this->sbd = $sbd;
    }

    // Getter và Setter cho hodem
    public function getHodem()
    {
        return $this->hodem;
    }

    public function setHodem($hodem)
    {
        $this->hodem = $hodem;
    }

    // Getter và Setter cho ten
    public function getTen()
    {
        return $this->ten;
    }

    public function setTen($ten)
    {
        $this->ten = $ten;
    }

    // Getter và Setter cho ngaysinh
    public function getNgaysinh()
    {
        return $this->ngaysinh;
    }

    public function setNgaysinh($ngaysinh)
    {
        $this->ngaysinh = $ngaysinh;
    }

    // Getter và Setter cho noisinh
    public function getNoisinh()
    {
        return $this->noisinh;
    }

    public function setNoisinh($noisinh)
    {
        $this->noisinh = $noisinh;
    }

    // Getter và Setter cho madonvi
    public function getMadonvi()
    {
        return $this->madonvi;
    }

    public function setMadonvi($madonvi)
    {
        $this->madonvi = $madonvi;
    }

    // Getter và Setter cho tgbatdau
    public function getTgbatdau()
    {
        return $this->tgbatdau;
    }

    public function setTgbatdau($tgbatdau)
    {
        $this->tgbatdau = $tgbatdau;
    }

    // Getter và Setter cho tgketthuc
    public function getTgketthuc()
    {
        return $this->tgketthuc;
    }

    public function setTgketthuc($tgketthuc)
    {
        $this->tgketthuc = $tgketthuc;
    }
}
