<?php

class BoDe
{
    // Thuộc tính
    public $mabode;
    public $tenbode;
    public $mamodun;

    // Hàm khởi tạo
    public function __construct($mabode, $tenbode, $mamodun)
    {
        $this->mabode = $mabode;
        $this->tenbode = $tenbode;
        $this->mamodun = $mamodun;
    }


    public function getMaboe()
    {
        return $this->mabode;
    }

    // Phương thức Setter cho mabode
    public function setMaBode($mabode)
    {
        $this->mabode = $mabode;
    }
    // Phương thức Getter cho tenbode
    public function getTenbode()
    {
        return $this->tenbode;
    }

    // Phương thức Setter cho tenbode
    public function setTenbode($tenbode)
    {
        $this->tenbode = $tenbode;
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
