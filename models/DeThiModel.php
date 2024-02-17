<?php
class Dethi
{
    // Properties
    public $stt;
    public $cauhoi;
    public $paA;
    public $paB;
    public $paC;
    public $paD;
    public $imgviauTencauhoi;
    public $imgviaupaA;
    public $imgviaupaB;
    public $imgviaupC;
    public $imgviaupaD;
    public $temp;
    public $padung;

    // Constructor
    public function __construct(
        $stt,
        $cauhoi,
        $paA,
        $paB,
        $paC,
        $paD,
        $imgviauTencauhoi,
        $imgviaupaA,
        $imgviaupaB,
        $imgviaupC,
        $imgviaupaD,
        $temp,
        $padung
    ) {
        $this->stt = $stt;
        $this->cauhoi = $cauhoi;
        $this->paA = $paA;
        $this->paB = $paB;
        $this->paC = $paC;
        $this->paD = $paD;
        $this->imgviauTencauhoi = $imgviauTencauhoi;
        $this->imgviaupaA = $imgviaupaA;
        $this->imgviaupaB = $imgviaupaB;
        $this->imgviaupC = $imgviaupC;
        $this->imgviaupaD = $imgviaupaD;
        $this->temp = $temp;
        $this->padung = $padung;
    }
    public function getpadung()
    {
        return $this->padung;
    }
    public function setpadung($padung)
    {
        $this->padung = $padung;
    }
    private function getFileExtension($st)
    {
        $j = strlen($st) - 1;
        $stemp = "";
        while ($st[$j] != ".") {
            $stemp = $st[$j] . $stemp;
            $j--;
        }
        $stemp = $st[$j] . $stemp;
        return $stemp;
    }

    public function displayImage($st1, $st3)
    {
        $extend = $this->getFileExtension($st1);
        // kiểm tra xem đây có phải là ảnh không
        if ($extend == '.bmp' || $extend == '.exr' || $extend == '.gif' || $extend == '.ico' || $extend == '.jp2' || $extend == '.jpeg' || $extend == '.jpg' || $extend == '.pbm' || $extend == '.pcx' || $extend == '.pgm' || $extend == '.png' || $extend == '.ppm' || $extend == '.psd' || $extend == '.tiff' || $extend == '.tga') {
            echo "<br><img src='./assets/upload/{$st3}/{$st1}' width='600' height='400' style='margin-top:0.6em;'>";
        }
        // kiểm tra xem đây có phải là video không
        if ($extend == '.3gp' || $extend == '.avi' || $extend == '.flv' || $extend == '.m4v' || $extend == '.mkv' || $extend == '.mov' || $extend == '.mp4' || $extend == '.mpeg' || $extend == '.ogv' || $extend == '.wmv' || $extend == '.webm') {
            $sstemp = substr($extend, 1);
            echo "<br>
                    <video width='400' height='300' controls style='margin:0;'>
                    <source src='./assets/upload/{$st3}/{$st1}' type='video/{$sstemp}'>
                    </video>
                ";
        }
        // kiểm tra xem đây có phải là audio không
        if ($extend == '.aac' || $extend == '.ac3' || $extend == '.aiff' || $extend == '.amr' || $extend == '.ape' || $extend == '.au' || $extend == '.flac' || $extend == '.m4a' || $extend == '.mka' || $extend == '.mp3' || $extend == '.mpc' || $extend == '.ogg' || $extend == '.ra' || $extend == '.wav' || $extend == '.wma') {
            $sstemp = substr($extend, 1);
            echo "<br>
                <audio controls>
                    <source src='./assets/upload/{$st3}/{$st1}' type='audio/{$sstemp}'>
                </audio>
            ";
        }
    }
    public function getTemp()
    {
        return $this->temp;
    }
    public function setTemp($temp)
    {
        return $this->temp = $temp;
    }
    // Getter and Setter Methods
    public function getStt()
    {
        return $this->stt;
    }

    public function setStt($stt)
    {
        $this->stt = $stt;
    }

    public function getCauhoi()
    {
        return $this->cauhoi;
    }

    public function setCauhoi($cauhoi)
    {
        $this->cauhoi = $cauhoi;
    }

    public function getPaA()
    {
        return $this->paA;
    }

    public function setPaA($paA)
    {
        $this->paA = $paA;
    }

    public function getPaB()
    {
        return $this->paB;
    }

    public function setPaB($paB)
    {
        $this->paB = $paB;
    }

    public function getPaC()
    {
        return $this->paC;
    }

    public function setPaC($paC)
    {
        $this->paC = $paC;
    }

    public function getPaD()
    {
        return $this->paD;
    }

    public function setPaD($paD)
    {
        $this->paD = $paD;
    }

    public function getImgviauTencauhoi()
    {
        return $this->imgviauTencauhoi;
    }

    public function setImgviauTencauhoi($imgviauTencauhoi)
    {
        $this->imgviauTencauhoi = $imgviauTencauhoi;
    }

    public function getImgviaupaA()
    {
        return $this->imgviaupaA;
    }

    public function setImgviaupaA($imgviaupaA)
    {
        $this->imgviaupaA = $imgviaupaA;
    }

    public function getImgviaupaB()
    {
        return $this->imgviaupaB;
    }

    public function setImgviaupaB($imgviaupaB)
    {
        $this->imgviaupaB = $imgviaupaB;
    }

    public function getImgviaupC()
    {
        return $this->imgviaupC;
    }

    public function setImgviaupC($imgviaupC)
    {
        $this->imgviaupC = $imgviaupC;
    }

    public function getImgviaupaD()
    {
        return $this->imgviaupaD;
    }

    public function setImgviaupaD($imgviaupaD)
    {
        $this->imgviaupaD = $imgviaupaD;
    }
}
