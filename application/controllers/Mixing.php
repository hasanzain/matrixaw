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
            $data = array('tanggal' => date("Y-m-d") );
            $this->load->view('header/header');
            $this->load->view('mixing/pengambilan_cat',$data);
            $this->load->view('header/footer');
        } else {
             //mencari stok terakhir
            $nama_barang = $this->input->post('nama_barang');
            $jumlah_masuk = $this->input->post('jumlah_beli');
            $this->db->where('toko',$this->session->userdata('toko'));
            $this->db->where('nama_barang', $nama_barang);
            $query = $this->db->get('stok_barang')->result_array();
            $stok_terakhir = "";
            foreach ($query as $key) {
                $stok_terakhir =  $key['jumlah_stok'];
            }
            //mencari stok terakhir

            $update_stok = $stok_terakhir - $jumlah_masuk;
            $stok_barang = array(
                'tanggal' => $this->input->post('tanggal'), 
                'kode_barang' => $this->input->post('kode_barang'), 
                'jumlah_stok' => $update_stok,
                'toko' => $this->session->userdata('toko')
            );

            $data_mutasi = array(
                'tanggal' => $this->input->post('tanggal'), 
                'nama_barang' => $this->input->post('nama_barang'), 
                'kode_barang' => $this->input->post('kode_barang'), 
                'harga_satuan' => $this->input->post('harga_satuan'), 
                'jumlah_keluar' => $this->input->post('jumlah_beli'),
                'toko' => $this->session->userdata('toko')
            );

            $this->db->where('toko',$this->session->userdata('toko'));
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
            $data = array('tanggal' => date("Y-m-d") );
            $this->load->view('header/header');
            $this->load->view('mixing/penjualan_mixing',$data);
            $this->load->view('header/footer');
        } else {
            $data = array
            (
            'tanggal' => $this->input->post('tanggal'),
            'warna' => $this->input->post('warna'),
            'jumlah_pesanan' => $this->input->post('jumlah_pesanan'),
            'harga' => $this->input->post('harga'),
            'keterangan' => $this->input->post('keterangan'),
            'toko' => $this->session->userdata('toko')
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

    public function data_mixing()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $filter = $this->input->post('filter');

        if($dari == null and $sampai=null){
            $data = array(
                'data_mixing' => null
                );
            $this->load->view('header/header');
            $this->load->view('mixing/data_mixing',$data);
            $this->load->view('header/footer');
        }
        else{
            if($filter != null){
                $this->db->where('keterangan', $filter);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Laporan tanggal '.$dari.' Sampai tanggal '.$sampai.'</div>');
            $this->db->where('toko',$this->session->userdata('toko'));
            $this->db->where('tanggal BETWEEN "'. date('Y-m-d', strtotime($dari)). '" and "'. date('Y-m-d', strtotime($sampai)).'"');
            $data = array(
                'data_mixing' => $this->db->get('penjualan_mixing')
                );
            $this->load->view('header/header');
            $this->load->view('mixing/data_mixing', $data);
            $this->load->view('header/footer');
        }
        
    }

    public function edit_mixing( $id = NULL )
    {
        $id = $this->input->get('id');
        $id_post = $this->input->post('id');
        $this->db->where('toko',$this->session->userdata('toko'));
        $this->db->where('id', $id);
        
        $data = array(
            'penjualan_mixing' => $this->db->get('penjualan_mixing')
        );
        if ($id != "") {
            $this->load->view('header/header'); 
            $this->load->view('mixing/edit_mixing',$data);
            $this->load->view('header/footer');
        }elseif ($id_post != ""){
            $data = array(
                'warna' => $this->input->post('warna'),
                'jumlah_pesanan' => $this->input->post('jumlah_pesanan'),
                'harga' => $this->input->post('harga')
            );
            $this->db->where('toko',$this->session->userdata('toko'));
            $this->db->where('id', $id_post);
           if ($this->db->update('penjualan_mixing', $data)){
               $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
               redirect('data_mixing');

           }else{
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal diubah</div>');
               redirect('data_mixing');
           }  

        }
        
    }
    
    public function delete_mixing( $id = NULL )
    {
        $id = $this->input->get('id');
        $this->db->where('toko',$this->session->userdata('toko'));
        $this->db->where('id', $id);
        
        if ($this->db->delete('penjualan_mixing')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
            redirect('data_mixing');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus</div>');
            redirect('data_mixing');
        }
        

    }

}

/* End of file Controllername.php */