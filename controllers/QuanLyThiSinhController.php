<?php
require_once 'dao/quanlythisinhDAO.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class QuanLyThiSinhController
{
    private $adminDAO;
    private $quanlythisinhDAO;
    public function __construct()
    {

        $this->adminDAO = new AdminDAO();
        $this->quanlythisinhDAO = new QuanlyThiSinhDAO();
    }
    public function index()
    {
        $kythi = $this->adminDAO->getKythi();
        require_once 'views/quanlythisinh/admin/quanlythisinh.php';
    }
    public function getphongthi()
    {
        $data = json_decode(file_get_contents("php://input"));
        $phongthis = $this->quanlythisinhDAO->getPhong($data->id); //;
        echo json_encode($phongthis, JSON_UNESCAPED_UNICODE);
        exit();
    }
    public function getthisinh()
    {
        $data = json_decode(file_get_contents("php://input"));
        $hocviens = $this->quanlythisinhDAO->getThiSinh($data->makythi, $data->tenphong); //;
        echo json_encode($hocviens, JSON_UNESCAPED_UNICODE);
        exit();
    }
    public function createthisinh()
    {
        $matkhau = "N";
        $i = 1;
        while ($i <= 7) //Tạo mật khẩu gồm 8 kí tự chữ số
        {
            $matkhau .= rand(0, 9);
            $i++;
        }
        $tempmk = $matkhau;
        $matkhau = md5($matkhau);
        $data = json_decode(file_get_contents("php://input"));

        $result = $this->quanlythisinhDAO->getThiSinhById($data->sbd);
        $donvi  = $this->quanlythisinhDAO->getMaDonVi($data->madonvi);
        if ($donvi) {
            if ($result) {
            } else {
                $this->quanlythisinhDAO->createThiSinh($data->sbd, $data->hodem, $data->ten, $data->ngaysinh, $data->noisinh, $data->kythi, $data->madonvi, $data->phongthi, $matkhau, null);
                $this->quanlythisinhDAO->createMatKhau($data->sbd, $tempmk);
                $mamodun = $this->quanlythisinhDAO->getMaMoDun($data->kythi);

                foreach ($mamodun as $key => $value) {
                    $this->quanlythisinhDAO->createAlowexam($data->sbd, $value);
                }
            }
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
            exit();
        } else {
            $this->quanlythisinhDAO->createMaDonVi($data->madonvi, $data->tendonvi);
            if ($result) {
            } else {
                $this->quanlythisinhDAO->createThiSinh($data->sbd, $data->hodem, $data->ten, $data->ngaysinh, $data->noisinh, $data->kythi, $data->madonvi, $data->phongthi, $matkhau, null);
                $this->quanlythisinhDAO->createMatKhau($data->sbd, $tempmk);
                $mamodun = $this->quanlythisinhDAO->getMaMoDun($data->kythi);

                foreach ($mamodun as $key => $value) {
                    $this->quanlythisinhDAO->createAlowexam($data->sbd, $value);
                }
            }
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
            exit();
        }
    }
    public function deletethisinh()
    {
        $data = json_decode(file_get_contents("php://input"));
        str_replace("'", "&#39;", $data->sbd);
        str_replace("'", "&#39;", $data->kythi);
        $this->quanlythisinhDAO->deleteRemote($data->sbd);
        $this->quanlythisinhDAO->deleteAllowexam($data->sbd);
        $this->quanlythisinhDAO->deleteDiem($data->sbd);
        $this->quanlythisinhDAO->deleteMatKhau($data->sbd);
        $this->quanlythisinhDAO->deleteDeThiSinh($data->sbd);
        $this->quanlythisinhDAO->deleteThiSinh($data->sbd);
    }
    public function updatethisinh()
    {
        $matkhau = "N";
        $i = 1;
        while ($i <= 7) //Tạo mật khẩu gồm 8 kí tự chữ số
        {
            $matkhau .= rand(0, 9);
            $i++;
        }
        $tempmk = $matkhau;
        $matkhau = md5($matkhau);
        $data = json_decode(file_get_contents("php://input"));
        $donvi  = $this->quanlythisinhDAO->getMaDonVi($data->madonvi);
        $result = $this->quanlythisinhDAO->getThiSinhById($data->sbd);
        if ($result) {
            if ($donvi) {
                $this->quanlythisinhDAO->updateThiSinh($data->sbd, $data->hodem, $data->ten, $data->ngaysinh, $data->noisinh, $data->kythi, $data->madonvi, $data->phongthi, $matkhau, null);
                $this->quanlythisinhDAO->updateMatKhau($data->sbd, $tempmk);
            } else {
                $this->quanlythisinhDAO->createMaDonVi($data->madonvi, $data->tendonvi);
                $this->quanlythisinhDAO->updateThiSinh($data->sbd, $data->hodem, $data->ten, $data->ngaysinh, $data->noisinh, $data->kythi, $data->madonvi, $data->phongthi, $matkhau, null);
                $this->quanlythisinhDAO->updateMatKhau($data->sbd, $tempmk);
            }
        }
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public function renderfieexl()
    {
        $data = json_decode(file_get_contents("php://input"));
        $mk = $this->quanlythisinhDAO->getmkbyphong($data->kythi, $data->phong);

        // Tạo một đối tượng Spreadsheet mới
        $spreadsheet = new Spreadsheet();

        // Căn giữa nội dung trong cột A
        $spreadsheet->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Tạo một style cho tiêu đề
        $headerStyle = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'DDDDDD',
                ],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        // Điền dữ liệu vào các ô trong Spreadsheet và áp dụng style cho tiêu đề
        $spreadsheet->getActiveSheet()->setCellValue('A1', 'STT')->getStyle('A1')->applyFromArray($headerStyle);
        $spreadsheet->getActiveSheet()->setCellValue('B1', 'SBD')->getStyle('B1')->applyFromArray($headerStyle);
        $spreadsheet->getActiveSheet()->setCellValue('C1', 'Họ đệm')->getStyle('C1')->applyFromArray($headerStyle);
        $spreadsheet->getActiveSheet()->setCellValue('D1', 'Tên')->getStyle('D1')->applyFromArray($headerStyle);
        $spreadsheet->getActiveSheet()->setCellValue('E1', 'Mật khẩu')->getStyle('E1')->applyFromArray($headerStyle);

        // Thiết lập độ rộng của các cột
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);

        $row = 2;
        foreach ($mk as $key => $value) {
            // Điền dữ liệu từ mảng $mk vào các ô tương ứng trong Spreadsheet
            $spreadsheet->getActiveSheet()->setCellValue('A' . $row, $key + 1);
            $spreadsheet->getActiveSheet()->setCellValue('B' . $row, $value->sbd);
            $spreadsheet->getActiveSheet()->setCellValue('C' . $row, $value->hodem);
            $spreadsheet->getActiveSheet()->setCellValue('D' . $row, $value->ten);
            $spreadsheet->getActiveSheet()->setCellValue('E' . $row, $value->matkhau);

            // Áp dụng đường viền cho các ô trong hàng
            $spreadsheet->getActiveSheet()->getStyle('A' . $row . ':E' . $row)->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
            ]);

            // Tăng số hàng để chuyển sang hàng tiếp theo
            $row++;
        }

        // Tạo một đối tượng writer cho file Excel
        $writer = new Xlsx($spreadsheet);

        // Thiết lập các header để tạo file Excel để tải xuống
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="hello_world.xlsx"');
        header('Cache-Control: max-age=0');

        // Gửi dữ liệu file Excel về client
        $writer->save('php://output');

        // Kết thúc chương trình
        exit;
    }
}
