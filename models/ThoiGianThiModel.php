<?php

class thoigianthi
{
    // Thuộc tính
    public $mamodun;
    public $tongcauhoi;
    public $tgthi;

    // Hàm khởi tạo
    public function __construct($mamodun, $tongcauhoi, $tgthi)
    {
        $this->mamodun = $mamodun;
        $this->tongcauhoi = $tongcauhoi;
        $this->tgthi = $tgthi;
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

    // Phương thức Getter cho tongcauhoi
    public function getTongcauhoi()
    {
        return $this->tongcauhoi;
    }

    // Phương thức Setter cho tongcauhoi
    public function setTongcauhoi($tongcauhoi)
    {
        $this->tongcauhoi = $tongcauhoi;
    }

    // Phương thức Getter cho tgthi
    public function getTgthi()
    {
        return $this->tgthi;
    }

    // Phương thức Setter cho tgthi
    public function setTgthi($tgthi)
    {
        $this->tgthi = $tgthi;
    }
}
