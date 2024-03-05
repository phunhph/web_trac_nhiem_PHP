<?php
require_once 'dao/diemDAO.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use TCPDF as TCPDF;

class DiemThiController
{
    private $adminDAO;
    private $dienthiDAO;
    public function __construct()
    {
        $this->adminDAO = new AdminDAO();
        $this->dienthiDAO = new DiemDAO();
    }
    public function index()
    {
        $kythi = $this->adminDAO->getKythi();
        require_once 'views/diemthi/admin/diemthi.php';
    }
    public function chitietbaithi()
    {
        $kythi = $this->adminDAO->getKythi();
        require_once 'views/diemthi/admin/chitietbaithi.php';
    }
    public function getdiem()
    {
        $data = json_decode(file_get_contents("php://input"));
        $thisinh = $this->dienthiDAO->getall($data->phong, $data->kythi);
        echo json_encode($thisinh, JSON_UNESCAPED_UNICODE);
    }
    public function getsbd()
    {
        $data = json_decode(file_get_contents("php://input"));
        $sbd = $this->dienthiDAO->getsbd($data->id);
        echo json_encode($sbd, JSON_UNESCAPED_UNICODE);
    }
    public function getketqua()
    {
        $data = json_decode(file_get_contents("php://input"));
        $baithi = $this->dienthiDAO->getketqua($data->id, $data->mamodun);
        echo json_encode($baithi, JSON_UNESCAPED_UNICODE);
    }

    public function getthongthibaithi()
    {
        $data = json_decode(file_get_contents("php://input"));
        $baithi = $this->dienthiDAO->getdethisinhBySBD($data->id, $data->mamodun);



        foreach ($baithi as $key => $value) {
            $cauhoi = $this->dienthiDAO->getcauhoibymchindethi($value->macauhoi);

            // Check if $cauhoi is an object

            // Process each cauhoi object
            $cauhoi[0]->tencauhoi = htmlspecialchars($cauhoi[0]->tencauhoi);
            $cauhoi[0]->padung = htmlspecialchars($cauhoi[0]->padung);
            $cauhoi[0]->pasai1 = htmlspecialchars($cauhoi[0]->pasai1);
            $cauhoi[0]->pasai2 = htmlspecialchars($cauhoi[0]->pasai2);
            $cauhoi[0]->pasai3 = htmlspecialchars($cauhoi[0]->pasai3);

            if ($value->padung == 'A') {
                switch ($value->temp) {
                    case 'A':
                        $cauhoi[0] = new Dethi(
                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            $cauhoi[0]->padung,
                            null,
                            null,
                            null,
                            $cauhoi[0]->imgviauTencauhoi,
                            null,
                            null,
                            null,
                            null,
                            $value->temp,
                            $value->padung
                        );
                        break;
                    case 'B':
                        $cauhoi[0] = new Dethi(
                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            $cauhoi[0]->padung,
                            $cauhoi[0]->pasai1,
                            null,
                            null,
                            $cauhoi[0]->imgviauTencauhoi,
                            $cauhoi[0]->imgviauPadung,
                            $cauhoi[0]->imgviauPasai1,
                            null,
                            null,
                            $value->temp,
                            $value->padung
                        );

                        break;
                    case 'C':
                        $cauhoi[0] = new Dethi(
                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            $cauhoi[0]->padung,
                            null,
                            $cauhoi[0]->pasai2,
                            null,
                            $cauhoi[0]->imgviauTencauhoi,
                            $cauhoi[0]->imgviauPadung,
                            null,
                            $cauhoi[0]->imgviauPasai2,
                            null,
                            $value->temp,
                            $value->padung
                        );
                        break;
                    case 'D':
                        $cauhoi[0] = new Dethi(
                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            $cauhoi[0]->padung,
                            null,
                            null,
                            $cauhoi[0]->pasai3,
                            $cauhoi[0]->imgviauTencauhoi,
                            $cauhoi[0]->imgviauPadung,
                            null,
                            null,
                            $cauhoi[0]->imgviauPasai3,
                            $value->temp,
                            $value->padung
                        );
                        break;
                    default:
                        $cauhoi[0] = new Dethi(

                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            $cauhoi[0]->padung,
                            null,
                            null,
                            null,
                            $cauhoi[0]->imgviauTencauhoi,
                            null,
                            null,
                            null,
                            null,
                            $value->temp,
                            $value->padung
                        );
                        break;
                }
                $bode[] = $cauhoi[0];
            } elseif ($value->padung == 'B') {
                switch ($value->temp) {
                    case 'A':
                        $cauhoi[0] = new Dethi(
                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            $cauhoi[0]->pasai1,
                            $cauhoi[0]->padung,
                            null,
                            null,
                            $cauhoi[0]->imgviauTencauhoi,
                            $cauhoi[0]->imgviauPasai1,
                            $cauhoi[0]->imgviauPadung,
                            null,
                            null,
                            $value->temp,
                            $value->padung
                        );
                        break;
                    case 'B':
                        $cauhoi[0] = new Dethi(
                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            null,
                            $cauhoi[0]->padung,
                            null,
                            null,
                            $cauhoi[0]->imgviauTencauhoi,
                            null,
                            $cauhoi[0]->imgviauPadung,
                            null,
                            null,
                            $value->temp,
                            $value->padung
                        );
                        break;
                    case 'C':
                        $cauhoi[0] = new Dethi(
                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            null,
                            $cauhoi[0]->padung,
                            $cauhoi[0]->pasai2,
                            null,
                            $cauhoi[0]->imgviauTencauhoi,
                            null,
                            $cauhoi[0]->imgviauPadung,
                            $cauhoi[0]->imgviauPasai2,
                            null,
                            $value->temp,
                            $value->padung
                        );
                        break;
                    case 'D':
                        $cauhoi[0] = new Dethi(
                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            null,
                            $cauhoi[0]->padung,
                            null,
                            $cauhoi[0]->pasai3,
                            $cauhoi[0]->imgviauTencauhoi,
                            null,
                            $cauhoi[0]->imgviauPadung,
                            null,
                            $cauhoi[0]->imgviauPasai3,
                            $value->temp,
                            $value->padung
                        );
                        break;
                    default:
                        $cauhoi[0] = new Dethi(
                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            null,
                            $cauhoi[0]->padung,
                            null,
                            $cauhoi[0]->pasai3,
                            $cauhoi[0]->imgviauTencauhoi,
                            null,
                            $cauhoi[0]->imgviauPadung,
                            null,
                            $cauhoi[0]->imgviauPasai3,
                            $value->temp,
                            $value->padung
                        );
                        break;
                }
                $bode[] = $cauhoi[0];
            } elseif ($value->padung == 'C') {


                switch ($value->temp) {
                    case 'A':
                        $cauhoi[0] = new Dethi(
                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            $cauhoi[0]->pasai1,
                            null,
                            $cauhoi[0]->padung,
                            null,
                            $cauhoi[0]->imgviauTencauhoi,
                            $cauhoi[0]->imgviauPasai1,
                            null,
                            $cauhoi[0]->imgviauPadung,
                            null,
                            $value->temp,
                            $value->padung
                        );
                        break;
                    case 'B':
                        $cauhoi[0] = new Dethi(
                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            null,
                            $cauhoi[0]->pasai2,
                            $cauhoi[0]->padung,
                            null,
                            $cauhoi[0]->imgviauTencauhoi,
                            null,
                            $cauhoi[0]->imgviauPasai2,
                            $cauhoi[0]->imgviauPadung,
                            null,
                            $value->temp,
                            $value->padung
                        );

                        break;
                    case 'C':
                        $cauhoi[0] = new Dethi(
                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            null,
                            null,
                            $cauhoi[0]->padung,
                            null,
                            $cauhoi[0]->imgviauTencauhoi,
                            null,
                            null,
                            $cauhoi[0]->imgviauPadung,
                            null,
                            $value->temp,
                            $value->padung
                        );
                        break;
                    case 'D':
                        $cauhoi[0] = new Dethi(
                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            null,
                            null,
                            $cauhoi[0]->padung,
                            $cauhoi[0]->pasai3,
                            $cauhoi[0]->imgviauTencauhoi,
                            null,
                            null,
                            $cauhoi[0]->imgviauPadung,
                            $cauhoi[0]->imgviauPasai3,
                            $value->temp,
                            $value->padung
                        );
                        break;
                    default:
                        $cauhoi[0] = new Dethi(
                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            null,
                            null,
                            $cauhoi[0]->padung,
                            null,
                            $cauhoi[0]->imgviauTencauhoi,
                            null,
                            null,
                            $cauhoi[0]->imgviauPadung,
                            null,
                            $value->temp,
                            $value->padung
                        );
                        break;
                }
                $bode[] = $cauhoi[0];
            } elseif ($value->padung == 'D') {


                switch ($value->temp) {
                    case 'A':
                        $cauhoi[0] = new Dethi(
                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            $cauhoi[0]->pasai1,
                            null,
                            null,
                            $cauhoi[0]->padung,
                            $cauhoi[0]->imgviauTencauhoi,
                            $cauhoi[0]->imgviauPasai1,
                            null,
                            null,
                            $cauhoi[0]->imgviauPadung,
                            $value->temp,
                            $value->padung
                        );
                        break;
                    case 'B':
                        $cauhoi[0] = new Dethi(
                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            null,
                            $cauhoi[0]->pasai2,
                            null,
                            $cauhoi[0]->padung,
                            $cauhoi[0]->imgviauTencauhoi,
                            null,
                            $cauhoi[0]->imgviauPasai2,
                            null,
                            $cauhoi[0]->imgviauPadung,
                            $value->temp,
                            $value->padung
                        );

                        break;
                    case 'C':
                        $cauhoi[0] = new Dethi(
                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            null,
                            null,
                            $cauhoi[0]->pasai3,
                            $cauhoi[0]->padung,
                            $cauhoi[0]->imgviauTencauhoi,
                            null,
                            null,
                            $cauhoi[0]->imgviauPasai3,
                            $cauhoi[0]->imgviauPadung,
                            $value->temp,
                            $value->padung
                        );
                        break;
                    case 'D':
                        $cauhoi[0] = new Dethi(
                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            null,
                            null,
                            null,
                            $cauhoi[0]->padung,
                            $cauhoi[0]->imgviauTencauhoi,
                            null,
                            null,
                            null,
                            $cauhoi[0]->imgviauPadung,
                            $value->temp,
                            $value->padung
                        );
                        $bode[] = $cauhoi[0];
                        break;
                    default:
                        $cauhoi[0] = new Dethi(
                            $value->socau,
                            $cauhoi[0]->tencauhoi,
                            null,
                            null,
                            null,
                            $cauhoi[0]->padung,
                            $cauhoi[0]->imgviauTencauhoi,
                            null,
                            null,
                            null,
                            $cauhoi[0]->imgviauPadung,
                            $value->temp,
                            $value->padung
                        );
                        break;
                }
                $bode[] = $cauhoi[0];
            }
        }
        echo json_encode($bode, JSON_UNESCAPED_UNICODE);
    }


    public function exportdiem()
    {
        $data = json_decode(file_get_contents("php://input"));
        $thisinh = $this->dienthiDAO->getall($data->phong, $data->kythi);
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
        $spreadsheet->getActiveSheet()->setCellValue('E1', 'Nơi sinh')->getStyle('E1')->applyFromArray($headerStyle);
        $spreadsheet->getActiveSheet()->setCellValue('F1', 'Ngày sinh')->getStyle('F1')->applyFromArray($headerStyle);
        $spreadsheet->getActiveSheet()->setCellValue('G1', 'Môn thi')->getStyle('G1')->applyFromArray($headerStyle);
        $spreadsheet->getActiveSheet()->setCellValue('H1', 'Số câu đúng')->getStyle('H1')->applyFromArray($headerStyle);
        $spreadsheet->getActiveSheet()->setCellValue('I1', 'Điểm')->getStyle('I1')->applyFromArray($headerStyle);
        $spreadsheet->getActiveSheet()->setCellValue('J1', 'Bắt đầu')->getStyle('J1')->applyFromArray($headerStyle);
        $spreadsheet->getActiveSheet()->setCellValue('K1', 'Kết thúc')->getStyle('K1')->applyFromArray($headerStyle);
        // Thiết lập độ rộng của các cột
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(25);
        $row = 2;
        foreach ($thisinh as $key => $value) {
            // Điền dữ liệu từ mảng $mk vào các ô tương ứng trong Spreadsheet
            $spreadsheet->getActiveSheet()->setCellValue('A' . $row, $key + 1);
            $spreadsheet->getActiveSheet()->setCellValue('B' . $row, $value->sbd);
            $spreadsheet->getActiveSheet()->setCellValue('C' . $row, $value->hodem);
            $spreadsheet->getActiveSheet()->setCellValue('D' . $row, $value->ten);
            $spreadsheet->getActiveSheet()->setCellValue('E' . $row, $value->noisinh);
            $spreadsheet->getActiveSheet()->setCellValue('F' . $row, $value->ngaysinh);
            $spreadsheet->getActiveSheet()->setCellValue('G' . $row, $value->tenmodun);
            $spreadsheet->getActiveSheet()->setCellValue('H' . $row, $value->socaudung);
            $spreadsheet->getActiveSheet()->setCellValue('I' . $row, $value->diem);
            $spreadsheet->getActiveSheet()->setCellValue('J' . $row, $value->thoigianthi);
            $spreadsheet->getActiveSheet()->setCellValue('K' . $row, $value->thoigianketthuc);

            // Áp dụng đường viền cho các ô trong hàng
            $spreadsheet->getActiveSheet()->getStyle('A' . $row . ':K' . $row)->applyFromArray([
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

    public function tinhtrangthi()
    {

        $kythi = $this->adminDAO->getKythi();
        require_once 'views/tinhtrangthi/admin/tinhtrangthi.php';
    }

    public function getthongtinall()
    {
        $data = json_decode(file_get_contents("php://input"));
        $fullthongtin = $this->dienthiDAO->tinhtrangthi($data->id);
        echo json_encode($fullthongtin, JSON_UNESCAPED_UNICODE);
    }
}
