<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

    }

    // List all your items
    public function stok_barang()
    {
        $data = array(
            'stok_barang' => $this->db->get('stok_barang')
        );
        $this->load->view('header/header');    
        $this->load->view('barang/stok_barang',$data);
        $this->load->view('header/footer');    
    }

    public function mutasi_barang()
    {
        $this->db->order_by('id', 'desc');
        
        $data = array(
            'stok_barang' => $this->db->get('mutasi_barang')
        );
        $this->load->view('header/header');    
        $this->load->view('barang/mutasi_barang',$data);
        $this->load->view('header/footer');    
    }

    // Add a new item
    public function barang_masuk()
    {
        $this->form_validation->set_rules('price_list', 'price_list', 'trim|required');
        $this->form_validation->set_rules('jumlah_beli', 'jumlah_beli', 'trim|required|numeric');
        $this->form_validation->set_rules('net', 'net', 'trim|required|numeric');
       
        
        if ($this->form_validation->run() == false) {
           $this->db->order_by('nama_barang', 'asc');
            $data = array(
                'barang' => $this->db->get('barang'),
                'supplier' => $this->db->get('supplier')
                );

            $this->load->view('header/header');    
            $this->load->view('barang/barang_masuk', $data);
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

            $update_stok = $stok_terakhir + $jumlah_masuk;
            $barang_masuk = array(
                'tanggal' => date("Y-m-d"), 
                'supplier' => $this->input->post('supplier'), 
                'nama_barang' => $this->input->post('nama_barang'), 
                'kode_barang' => $this->input->post('kode_barang'), 
                'price_list' => $this->input->post('price_list'), 
                'diskon1' => $this->input->post('diskon1'), 
                'diskon2' => $this->input->post('diskon2'), 
                'diskon3' => $this->input->post('diskon3'), 
                'diskon4' => $this->input->post('diskon4'), 
                'ppn' => $this->input->post('ppn'), 
                'net' => $this->input->post('net'), 
                'jumlah_beli' => $this->input->post('jumlah_beli'), 
                'total' => $this->input->post('total'), 
                'keterangan' => $this->input->post('keterangan'), 
            );


            $stok_barang = array(
                'tanggal' => date("Y-m-d"), 
                'kode_barang' => $this->input->post('kode_barang'), 
                'harga_satuan' => $this->input->post('net'), 
                'jumlah_stok' => $update_stok
            );

            $data_mutasi = array(
                'tanggal' => date("Y-m-d"), 
                'nama_barang' => $nama_barang, 
                'kode_barang' => $this->input->post('kode_barang'), 
                'harga_satuan' => $this->input->post('net'), 
                'jumlah_stok' => $this->input->post('jumlah_beli')
            );

            $_insert_barang_masuk = $this->db->insert('barang_masuk', $barang_masuk);    
            $this->db->where('nama_barang', $nama_barang);
            $update = $this->db->update('stok_barang', $stok_barang);
            $insert = $this->db->insert('mutasi_barang', $data_mutasi);
            if ($update && $insert && $_insert_barang_masuk) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Stok berhasil ditambahkan</div>');
                redirect('barang_masuk');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Stok gagat ditambahkan</div>');
                redirect('barang_masuk');
            }

        }
        
    }

    public function daftar_barang_masuk()
    {
        $this->db->order_by('id', 'desc');
        
        $data = array(
            'barang_masuk' => $this->db->get('barang_masuk') );
        
        $this->load->view('header/header');    
        $this->load->view('barang/daftar_barang_masuk',$data);
        $this->load->view('header/footer'); 
        
    }

    public function order_barang()
    {
        $this->load->view('header/header');    
        $this->load->view('barang/order_barang');
        $this->load->view('header/footer'); 
    }

    //Update one item
    public function update( $id = NULL )
    {
        
    }

    //Delete one item
    public function delete( $id = NULL )
    {

    }
}

/* End of file Controllername.php */