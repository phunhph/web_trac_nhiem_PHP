<?php

class DonVi
{
    // Thuộc tính
    public $madonvi;
    public $tendonvi;

    // Hàm khởi tạo
    public function __construct($madonvi, $tendonvi)
    {
        $this->madonvi = $madonvi;
        $this->tendonvi = $tendonvi;
    }

    // Phương thức Getter cho madonvi
    public function getMadonvi()
    {
        return $this->madonvi;
    }

    // Phương thức Setter cho madonvi
    public function setMadonvi($madonvi)
    {
        $this->madonvi = $madonvi;
    }

    // Phương thức Getter cho tendonvi
    public function getTendonvi()
    {
        return $this->tendonvi;
    }

    // Phương thức Setter cho tendonvi
    public function setTendonvi($tendonvi)
    {
        $this->tendonvi = $tendonvi;
    }
}
