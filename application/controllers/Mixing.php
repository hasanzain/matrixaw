<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class mixing extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role')=='') {
            redirect('auth');
        }

    }

    public function pengambilan_cat()
    {
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'trim|required');
        $this->form_validation->set_rules('kode_barang', 'kode_barang', 'trim|required');
        $this->form_validation->set_rules('jumlah_beli', 'jumlah_beli', 'trim|required');
        
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header/header');
            $this->load->view('mixing/pengambilan_cat');
            $this->load->view('header/footer');
        } else {
             //mencari stok terakhir
            $nama_barang = $this->input->post('nama_barang');
            $jumlah_masuk = $this->input->post('jumlah_beli');
            $this->db->where('nama_barang', $nama_barang);
            $query = $this->db->get('stok_barang')->result_array();
            $stok_terakhir = "";
            foreach ($query as $key) {
                $stok_terakhir =  $key['jumlah_stok'];
            }
            //mencari stok terakhir

            $update_stok = $stok_terakhir - $jumlah_masuk;
            $stok_barang = array(
                'tanggal' => date("Y-m-d"), 
                'kode_barang' => $this->input->post('kode_barang'), 
                'jumlah_stok' => $update_stok
            );

            $data_mutasi = array(
                'tanggal' => date("Y-m-d"), 
                'nama_barang' => $this->input->post('nama_barang'), 
                'kode_barang' => $this->input->post('kode_barang'), 
                'harga_satuan' => $this->input->post('harga_satuan'), 
                'jumlah_keluar' => $this->input->post('jumlah_beli')
            );

   
            $this->db->where('nama_barang', $nama_barang);
            $update = $this->db->update('stok_barang', $stok_barang);
            $insert = $this->db->insert('mutasi_barang', $data_mutasi);

            if ($update && $insert) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengambilan cat berhasil</div>');
                redirect('pengambilan_cat');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pengambilan cat gagal ditambahkan </div>');
                redirect('pengambilan_cat');
            }
        }
        
        
    }

    public function penjualan_mixing()
    {
        $this->form_validation->set_rules('warna', 'warna', 'trim|required');
        $this->form_validation->set_rules('jumlah_pesanan', 'jumlah_pesanan', 'trim|required|numeric');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required|numeric');
        

        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header/header');
            $this->load->view('mixing/penjualan_mixing');
            $this->load->view('header/footer');
        } else {
            $data = array
            (
            'tanggal' => date("Y-m-d"), 
            'warna' => $this->input->post('warna'),
            'jumlah_pesanan' => $this->input->post('jumlah_pesanan'),
            'harga' => $this->input->post('harga'),
            'keterangan' => $this->input->post('keterangan'),
        );

        
        if ($this->db->insert('penjualan_mixing', $data)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Penjualan berhasil ditambahkan </div>');
            redirect('penjualan_mixing');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Penjualan gagal ditambahkan</div>');
            redirect('penjualan_mixing');
        }
        
        }
        
    }

}

/* End of file Controllername.php */