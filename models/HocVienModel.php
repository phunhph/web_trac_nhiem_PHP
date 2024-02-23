<?php

class HocVien
{
    // Thuộc tính
    public $sbd;
    public $hodem;
    public $ten;
    public $ngaysinh;
    public $noisinh;
    public $makythi;
    public $madonvi;
    public $tendonvi;
    public $tenphongthi;
    public $matkhau;
    public $profile;

    // Hàm khởi tạo
    public function __construct($sbd, $hodem, $ten, $ngaysinh, $noisinh, $makythi, $madonvi, $tendonvi, $tenphongthi, $matkhau, $profile)
    {
        $this->sbd = $sbd;
        $this->hodem = $hodem;
        $this->ten = $ten;
        $this->ngaysinh = $ngaysinh;
        $this->noisinh = $noisinh;
        $this->makythi = $makythi;
        $this->madonvi = $madonvi;
        $this->tendonvi = $tendonvi;
        $this->tenphongthi = $tenphongthi;
        $this->matkhau = $matkhau;
        $this->profile = $profile;
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

    // Phương thức Getter cho hodem
    public function getHodem()
    {
        return $this->hodem;
    }

    // Phương thức Setter cho hodem
    public function setHodem($hodem)
    {
        $this->hodem = $hodem;
    }

    // Phương thức Getter cho ten
    public function getTen()
    {
        return $this->ten;
    }

    // Phương thức Setter cho ten
    public function setTen($ten)
    {
        $this->ten = $ten;
    }

    // Phương thức Getter cho ngaysinh
    public function getNgaysinh()
    {
        return $this->ngaysinh;
    }

    // Phương thức Setter cho ngaysinh
    public function setNgaysinh($ngaysinh)
    {
        $this->ngaysinh = $ngaysinh;
    }

    // Phương thức Getter cho noisinh
    public function getNoisinh()
    {
        return $this->noisinh;
    }

    // Phương thức Setter cho noisinh
    public function setNoisinh($noisinh)
    {
        $this->noisinh = $noisinh;
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

    // Phương thức Getter cho tenphongthi
    public function getTenphongthi()
    {
        return $this->tenphongthi;
    }

    // Phương thức Setter cho tenphongthi
    public function setTenphongthi($tenphongthi)
    {
        $this->tenphongthi = $tenphongthi;
    }

    // Phương thức Getter cho matkhau
    public function getMatkhau()
    {
        return $this->matkhau;
    }

    // Phương thức Setter cho matkhau
    public function setMatkhau($matkhau)
    {
        $this->matkhau = $matkhau;
    }

    // Phương thức Getter cho profile
    public function getProfile()
    {
        return $this->profile;
    }

    // Phương thức Setter cho profile
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }
}
