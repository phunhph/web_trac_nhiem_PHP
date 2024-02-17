<?php

class CauHoi
{
    // Thuộc tính
    public $macauhoi;
    public $tencauhoi;
    public $padung;
    public $pasai1;
    public $pasai2;
    public $pasai3;
    public $imgviauTencauhoi;
    public $imgviaupadung;
    public $imgviaupasai1;
    public $imgviaupasai2;
    public $imgviaupasai3;
    public $mucdo;
    public $mabode;

    // Hàm khởi tạo
    public function __construct(
        $macauhoi,
        $tencauhoi,
        $padung,
        $pasai1,
        $pasai2,
        $pasai3,
        $imgviauTencauhoi,
        $imgviaupadung,
        $imgviaupasai1,
        $imgviaupasai2,
        $imgviaupasai3,
        $mucdo,
        $mabode
    ) {
        $this->macauhoi = $macauhoi;
        $this->tencauhoi = $tencauhoi;
        $this->padung = $padung;
        $this->pasai1 = $pasai1;
        $this->pasai2 = $pasai2;
        $this->pasai3 = $pasai3;
        $this->imgviauTencauhoi = $imgviauTencauhoi;
        $this->imgviaupadung = $imgviaupadung;
        $this->imgviaupasai1 = $imgviaupasai1;
        $this->imgviaupasai2 = $imgviaupasai2;
        $this->imgviaupasai3 = $imgviaupasai3;
        $this->mucdo = $mucdo;
        $this->mabode = $mabode;
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

    // Phương thức Getter cho tencauhoi
    public function getTencauhoi()
    {
        return $this->tencauhoi;
    }

    // Phương thức Setter cho tencauhoi
    public function setTencauhoi($tencauhoi)
    {
        $this->tencauhoi = $tencauhoi;
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

    // Phương thức Getter cho pasai1
    public function getPasai1()
    {
        return $this->pasai1;
    }

    // Phương thức Setter cho pasai1
    public function setPasai1($pasai1)
    {
        $this->pasai1 = $pasai1;
    }

    // Phương thức Getter cho pasai2
    public function getPasai2()
    {
        return $this->pasai2;
    }

    // Phương thức Setter cho pasai2
    public function setPasai2($pasai2)
    {
        $this->pasai2 = $pasai2;
    }

    // Phương thức Getter cho pasai3
    public function getPasai3()
    {
        return $this->pasai3;
    }

    // Phương thức Setter cho pasai3
    public function setPasai3($pasai3)
    {
        $this->pasai3 = $pasai3;
    }

    // Phương thức Getter cho imgviauTencauhoi
    public function getImgviauTencauhoi()
    {
        return $this->imgviauTencauhoi;
    }

    // Phương thức Setter cho imgviauTencauhoi
    public function setImgviauTencauhoi($imgviauTencauhoi)
    {
        $this->imgviauTencauhoi = $imgviauTencauhoi;
    }

    // Phương thức Getter cho imgviaupadung
    public function getImgviaupadung()
    {
        return $this->imgviaupadung;
    }

    // Phương thức Setter cho imgviaupadung
    public function setImgviaupadung($imgviaupadung)
    {
        $this->imgviaupadung = $imgviaupadung;
    }

    // Phương thức Getter cho imgviaupasai1
    public function getImgviaupasai1()
    {
        return $this->imgviaupasai1;
    }

    // Phương thức Setter cho imgviaupasai1
    public function setImgviaupasai1($imgviaupasai1)
    {
        $this->imgviaupasai1 = $imgviaupasai1;
    }

    // Phương thức Getter cho imgviaupasai2
    public function getImgviaupasai2()
    {
        return $this->imgviaupasai2;
    }

    // Phương thức Setter cho imgviaupasai2
    public function setImgviaupasai2($imgviaupasai2)
    {
        $this->imgviaupasai2 = $imgviaupasai2;
    }

    // Phương thức Getter cho imgviaupasai3
    public function getImgviaupasai3()
    {
        return $this->imgviaupasai3;
    }

    // Phương thức Setter cho imgviaupasai3
    public function setImgviaupasai3($imgviaupasai3)
    {
        $this->imgviaupasai3 = $imgviaupasai3;
    }

    // Phương thức Getter cho mucdo
    public function getMucdo()
    {
        return $this->mucdo;
    }

    // Phương thức Setter cho mucdo
    public function setMucdo($mucdo)
    {
        $this->mucdo = $mucdo;
    }

    // Phương thức Getter cho mabode
    public function getMabode()
    {
        return $this->mabode;
    }

    // Phương thức Setter cho mabode
    public function setMabode($mabode)
    {
        $this->mabode = $mabode;
    }
}
