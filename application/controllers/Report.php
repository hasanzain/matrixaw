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
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $this->db->where('bulan', $bulan);
        $this->db->where('tahun', $tahun);
        
        $hasil = $this->db->get('laporan_penjualan')->result_array();


        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'LAPORAN KEUANGAN BULANAN')
                    ->setCellValue('A2', 'TOKO MATRIX AW');

        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A5', 'No')
                    ->setCellValue('B5', 'Tanggal')
                    ->setCellValue('C5', 'Tahun')
                    ->setCellValue('D5', 'Nama Barang')
                    ->setCellValue('E5', 'Jumlah Beli')
                    ->setCellValue('F5', 'Harga Satuan')
                    ->setCellValue('G5', 'Total')
                    ->setCellValue('H5', 'Pengeluaran');

        $kolom = 6;
        $nomor = 1;
        $pemasukan = 0;
        $pengeluaran = 0;
        $akhir = 0;

        foreach ($hasil as $key) {
            $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $key['tanggal'])
                           ->setCellValue('C' . $kolom, $key['tahun'])
                           ->setCellValue('D' . $kolom, $key['nama_barang'])
                           ->setCellValue('E' . $kolom, $key['jumlah_beli'])
                           ->setCellValue('F' . $kolom, $key['harga_satuan'])
                           ->setCellValue('G' . $kolom, $key['total'])
                           ->setCellValue('H' . $kolom, $key['kredit']);

            $kolom++;
            $nomor++;
            $pemasukan += $key['total'];
            $pengeluaran += $key['kredit'];
            $akhir = $pemasukan - $pengeluaran;
        }

        $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, 'JUMLAH')
                           ->setCellValue('G' . $kolom, $pemasukan)
                           ->setCellValue('H' . $kolom, $pengeluaran)
                           ->setCellValue('I' . $kolom, $akhir);

        // CUSTOM CELL
        $spreadsheet->getActiveSheet()->mergeCells('A1:H1');
        $spreadsheet->getActiveSheet()->mergeCells('A2:H2');
        $spreadsheet->getActiveSheet()->getStyle('A1:H2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        
        


        $spreadsheet->getActiveSheet()->mergeCells('A' . $kolom . ':F' .$kolom);
        
        
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Latihan.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
                      

        
        
    }

}

/* End of file Controllername.php */