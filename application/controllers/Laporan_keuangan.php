<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class laporan_keuangan extends CI_Controller {


    public function penjualan_harian()
    {
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'trim|required');
        $this->form_validation->set_rules('jumlah_beli', 'jumlah_beli', 'trim|required');
        $this->form_validation->set_rules('harga_satuan', 'harga_satuan', 'trim|required');
        $this->form_validation->set_rules('total', 'toal', 'trim|required');

        
        if ($this->form_validation->run() == FALSE) {
            $this->db->order_by('nama_barang', 'asc');
            $data = array(
                'barang' => $this->db->get('barang'), 
            );
            $this->load->view('header/header');
            $this->load->view('laporan_keuangan/penjualan_harian',$data);
            $this->load->view('header/footer');
        } else {
            $data = array(
                'tanggal' => date("Y-m-d"),
                'nama_barang' => $this->input->post('nama_barang'),
                'jumlah_beli' => $this->input->post('jumlah_beli'),
                'harga_satuan' => $this->input->post('harga_satuan'),
                'total' => $this->input->post('total')
             );
            $query = $this->db->insert('penjualan', $data);
            if ($query) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil ditambahkan</div>');
                redirect('penjualan_harian');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal ditambahkan</div>');
                redirect('penjualan_harian');
            }
            
        }
        
    }

 
    public function form_laporan()
    {

        $this->form_validation->set_rules('laporan', 'laporan', 'trim|required');
        $this->form_validation->set_rules('bulan', 'bulan', 'trim|required');
        $this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
        $this->form_validation->set_rules('dari', 'dari', 'trim|required');
        $this->form_validation->set_rules('sampai', 'sampai', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header/header');
            $this->load->view('laporan_keuangan/form_laporan');
            $this->load->view('header/footer');
        } else {
            $laporan = $this->input->post('laporan');
            $dari = $this->input->post('dari');
            $sampai = $this->input->post('sampai');


            if ($dari != null and $sampai !=null) {



                // menambahkan data penjualan
                $this->db->where('tanggal BETWEEN "'. date('Y-m-d', strtotime($dari)). '" and "'. date('Y-m-d', strtotime($sampai)).'"');
                $penjualan = $this->db->get('penjualan')->result_array();
                foreach ($penjualan as $key) {
                    $data = array(
                        'laporan' => $laporan,
                        'bulan' => $this->input->post('bulan'),
                        'tahun' => $this->input->post('tahun'),
                        'tanggal' => $key['tanggal'],
                        'nama_barang' => $key['nama_barang'],
                        'jumlah_beli' => $key['jumlah_beli'],
                        'harga_satuan' => $key['harga_satuan'],
                        'total' => $key['total']
                     );
                    $tatus_penjualan = $this->db->insert('laporan_penjualan', $data);
                }
                // menambahkan data penjualan

                // menambahkan data hutang_customer
                $this->db->where('tanggal BETWEEN "'. date('Y-m-d', strtotime($dari)). '" and "'. date('Y-m-d', strtotime($sampai)).'"');
                $piutang_custmer = $this->db->get('piutang_customer')->result_array();
                foreach ($piutang_custmer as $key) {
                    $data = array(
                        'laporan' => $laporan,
                        'bulan' => $this->input->post('bulan'),
                        'tahun' => $this->input->post('tahun'),
                        'tanggal' => $key['tanggal'],
                        'nama_barang' => $key['nama_perusahaan'],
                        'total' => $key['nominal_pembayaran'],
                        'kredit' => $key['nominal_hutang']
                     );
                     $tatus_piutang_customer = $this->db->insert('laporan_penjualan', $data);
                     
                }
                // menambahkan data hutang_customer


                // menambahkan data hutang_toko
                $this->db->where('tanggal BETWEEN "'. date('Y-m-d', strtotime($dari)). '" and "'. date('Y-m-d', strtotime($sampai)).'"');
                $piutang_custmer = $this->db->get('piutang_toko')->result_array();
                foreach ($piutang_custmer as $key) {
                    $data = array(
                        'laporan' => $laporan,
                        'bulan' => $this->input->post('bulan'),
                        'tahun' => $this->input->post('tahun'),
                        'tanggal' => $key['tanggal'],
                        'nama_barang' => $key['nama_perusahaan'],
                        'total' => $key['nominal_hutang'],
                        'kredit' => $key['nominal_pembayaran']
                     );
                     $tatus_piutang_customer = $this->db->insert('laporan_penjualan', $data);
                     
                }
                // menambahkan data hutang_toko
                
            
            

                if ($status_penjualan && $status_piutang_customer) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Laporan gagal ditambahkan</div>');
                    redirect('form_laporan');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Laporan berhasil ditambahkan</div>');
                    redirect('form_laporan');
                }
            }
            
        }
        
    }


    public function laporan_penjualan()
    {
        $laporan = $this->input->post('laporan');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        
        if ($laporan == null) {
            $data = array(
                'laporan_penjualan' => null
                );
            $this->load->view('header/header');
            $this->load->view('laporan_keuangan/laporan_penjualan', $data);
            $this->load->view('header/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Laporan '.$laporan.' '.$bulan.' '.$tahun.'</div>');
            $this->db->where('laporan', $laporan);
            $this->db->where('bulan', $bulan);
            $this->db->where('tahun', $tahun);
            
            $data = array(
                'laporan_penjualan' => $this->db->get('laporan_penjualan')
                );
            $this->load->view('header/header');
            $this->load->view('laporan_keuangan/laporan_penjualan', $data);
            $this->load->view('header/footer');
        }
    }



    public function data_penjualan()
    {
        $tanggal = $this->input->post('tanggal');

        
        if($tanggal == null){
            $data = array(
                'data_penjualan' => null
                );
            $this->load->view('header/header');
            $this->load->view('laporan_keuangan/data_penjualan',$data);
            $this->load->view('header/footer');
        }
        else{

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Laporan tanggal '.$tanggal.'</div>');
            $this->db->where('tanggal', $tanggal);
            $data = array(
                'data_penjualan' => $this->db->get('penjualan')
                );
            $this->load->view('header/header');
            $this->load->view('laporan_keuangan/data_penjualan', $data);
            $this->load->view('header/footer');
        }
        
    }

}

/* End of file Controllername.php */