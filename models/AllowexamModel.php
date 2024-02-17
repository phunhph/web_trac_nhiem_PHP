<?php

class AllowExam
{
    // Thuộc tính
    public $sbd;
    public $mamodun;
    public $allowe;

    // Hàm khởi tạo
    public function __construct($sbd, $mamodun, $allowe)
    {
        $this->sbd = $sbd;
        $this->mamodun = $mamodun;
        $this->allowe = $allowe;
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

    // Phương thức Getter cho allowe
    public function getAllowe()
    {
        return $this->allowe;
    }

    // Phương thức Setter cho allowe
    public function setAllowe($allowe)
    {
        $this->allowe = $allowe;
    }
}
