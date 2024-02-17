<?php

class Remote
{
    // Thuộc tính
    public $sbd;
    public $mamodun;
    public $ipaddress;
    public $estatus;

    // Hàm khởi tạo
    public function __construct($sbd, $mamodun, $ipaddress, $estatus)
    {
        $this->sbd = $sbd;
        $this->mamodun = $mamodun;
        $this->ipaddress = $ipaddress;
        $this->estatus = $estatus;
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

    // Phương thức Getter cho ipaddress
    public function getIpaddress()
    {
        return $this->ipaddress;
    }

    // Phương thức Setter cho ipaddress
    public function setIpaddress($ipaddress)
    {
        $this->ipaddress = $ipaddress;
    }

    // Phương thức Getter cho estatus
    public function getEstatus()
    {
        return $this->estatus;
    }

    // Phương thức Setter cho estatus
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    }
}
