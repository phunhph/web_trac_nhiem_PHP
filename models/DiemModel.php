<?php

class Diem
{
    // Thuộc tính
    public $sbd;
    public $mamodun;
    public $diem;
    public $socaudung;
    public $thoigianthi;
    public $thoigianconlai;
    public $thoigianketthuc;

    // Hàm khởi tạo
    public function __construct($sbd, $mamodun, $diem, $socaudung, $thoigianthi, $thoigianconlai, $thoigianketthuc)
    {
        $this->sbd = $sbd;
        $this->mamodun = $mamodun;
        $this->diem = $diem;
        $this->socaudung = $socaudung;
        $this->thoigianthi = $thoigianthi;
        $this->thoigianconlai = $thoigianconlai;
        $this->thoigianketthuc = $thoigianketthuc;
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

    // Phương thức Getter cho diem
    public function getDiem()
    {
        return $this->diem;
    }

    // Phương thức Setter cho diem
    public function setDiem($diem)
    {
        $this->diem = $diem;
    }

    // Phương thức Getter cho socaudung
    public function getSocaudung()
    {
        return $this->socaudung;
    }

    // Phương thức Setter cho socaudung
    public function setSocaudung($socaudung)
    {
        $this->socaudung = $socaudung;
    }

    // Phương thức Getter cho thoigianthi
    public function getThoigianthi()
    {
        return $this->thoigianthi;
    }

    // Phương thức Setter cho thoigianthi
    public function setThoigianthi($thoigianthi)
    {
        $this->thoigianthi = $thoigianthi;
    }

    // Phương thức Getter cho thoigianconlai
    public function getThoigianconlai()
    {
        return $this->thoigianconlai;
    }

    // Phương thức Setter cho thoigianconlai
    public function setThoigianconlai($thoigianconlai)
    {
        $this->thoigianconlai = $thoigianconlai;
    }

    // Phương thức Getter cho thoigianketthuc
    public function getThoigianketthuc()
    {
        return $this->thoigianketthuc;
    }

    // Phương thức Setter cho thoigianketthuc
    public function setThoigianketthuc($thoigianketthuc)
    {
        $this->thoigianketthuc = $thoigianketthuc;
    }
}
