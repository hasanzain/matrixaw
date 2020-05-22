<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Report extends CI_Controller {

    public function index()
    {
        $data = array('report' => $this->db->get('report') );
        $this->load->view('header/header');
        $this->load->view('report/report',$data);
        $this->load->view('header/footer');
        
        
    }

    public function export()
    {
        $tabel = $this->input->post('nama_tabel');
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $this->db->where('tanggal BETWEEN "'. date('Y-m-d', strtotime($dari)). '" and "'. date('Y-m-d', strtotime($sampai)).'"');
        // return $this->db->get($tabel);
        $hasil = $this->db->get($tabel)->result_array();


        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'No')
                    ->setCellValue('B1', 'Tanggal')
                    ->setCellValue('C1', 'Nama barang')
                    ->setCellValue('D1', 'Jumlah beli')
                    ->setCellValue('E1', 'Harga satuan')
                    ->setCellValue('F1', 'Total');

        $kolom = 2;
        $nomor = 1;

        foreach ($hasil as $key) {
            $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $key['tanggal'])
                           ->setCellValue('C' . $kolom, $key['nama_barang'])
                           ->setCellValue('D' . $kolom, $key['jumlah_beli'])
                           ->setCellValue('E' . $kolom, $key['harga_satuan'])
                           ->setCellValue('F' . $kolom, $key['total']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Latihan.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
                      

        
        
    }

}

/* End of file Controllername.php */