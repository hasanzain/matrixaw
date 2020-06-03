<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Inventory extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role')=='') {
            redirect('auth');
        }

    }

    // List all your items
    public function daftar_inventory( $offset = 0 )
    {
        $this->db->order_by('nama_barang', 'asc');
        $data = array(
            'barang' => $this->db->get('barang')
         );
        $this->load->view('header/header');
        $this->load->view('inventory/daftar_inventory',$data);
        $this->load->view('header/footer');

    }

    // Add a new item
    public function tambah_inventory()
    {
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'trim|required');
        $this->form_validation->set_rules('kode_barang', 'kode_barang', 'trim|required');
        $this->form_validation->set_rules('harga_satuan', 'harga_satuan', 'trim|required');

        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header/header');
            $this->load->view('inventory/tambah_inventory');
            $this->load->view('header/footer');
        } else {
            $data = array(
                'nama_barang' => $this->input->post('nama_barang'),
                'kode_barang' => $this->input->post('kode_barang'),
                'harga_satuan' => $this->input->post('harga_satuan'),
                );
            $stok_barang = array(
                'tanggal' => date("Y-m-d"),
                'nama_barang' => $this->input->post('nama_barang'),
                'kode_barang' => $this->input->post('kode_barang'),
                'harga_satuan' => $this->input->post('harga_satuan'),
                
                );
                
            if ($this->db->insert('barang', $data) && $this->db->insert('stok_barang', $stok_barang)  && $this->db->insert('mutasi_barang', $stok_barang)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
                redirect('tambah_inventory');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal ditambahkan</div>');
                redirect('tambah_inventory');
            }
            
        }
        
        
    }

    //Update one item
    public function update_inventory( $id = NULL )
    {
        $id = $this->input->get('id');
        $id_post = $this->input->post('id');
        $this->db->where('id', $id);
        
        $data = array(
            'update' => $this->db->get('barang')
        );
        if ($id != "") {
            $this->load->view('header/header'); 
            $this->load->view('inventory/update_inventory',$data);
            $this->load->view('header/footer');
        }elseif ($id_post != ""){
            $data = array(
                'nama_barang' => $this->input->post('nama_barang'),
                'kode_barang' => $this->input->post('kode_barang'),
                'harga_satuan' => $this->input->post('harga_satuan')
            );
            $this->db->where('id', $id_post);
           if ($this->db->update('barang', $data)){
               $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
               redirect('daftar_inventory');

           }else{
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal diubah</div>');
               redirect('daftar_inventory');
           }  

        }
        
    }

    //Delete one item
    public function delete_inventory( $id = NULL )
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        
        if ($this->db->delete('barang')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
            redirect('daftar_inventory');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus</div>');
            redirect('daftar_inventory');
        }
        

    }
}

/* End of file Controllername.php */