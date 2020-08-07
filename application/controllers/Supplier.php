<?php


defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Supplier extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role')=='') {
            redirect('auth');
        }

    }

    // Add a new item
    public function tambah_supplier()
    {
        if ($this->session->userdata('role')!='admin') {
            redirect('auth/notadmin');
        }

        $this->form_validation->set_rules('nama_supplier', 'nama_supplier', 'trim|required');
        
        if ($this->form_validation->run() == FALSE){ 
            $this->load->view('header/header');
            $this->load->view('supplier/tambah_supplier');
            $this->load->view('header/footer');
        } else {
            $data = array(
            'nama_supplier' => $this->input->post('nama_supplier'),
            'toko' => $this->session->userdata('toko')
         );
         
         
         if ($this->db->insert('supplier', $data)) {
            $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">Data berhasil ditambahkan</div>');
            redirect('tambah_supplier');
         }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal ditambahkan</div>');
            redirect('tambah_supplier');
         }


        }

    }

    //Update one item
    public function list_alarm()
    {
        //auto update tanggal bayar
        $new = array(
            'tanggal_bayar' => date('Y-m-d'),
            'keterangan' => 'pembayaran sudah telat',
         );
        $this->db->where('toko',$this->session->userdata('toko'));
        $this->db->where("tanggal_bayar < ", date('Y-m-d'));
        $this->db->update('supplier', $new);
        

        $tgl = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $tanggal = $tgl+2;
        $now = date('Y-m-d');
        
        $hmin = ($tahun."-".$bulan."-".$tanggal);
        $this->db->where('toko',$this->session->userdata('toko'));
        $this->db->where('tanggal_bayar BETWEEN "'. date('Y-m-d', strtotime($now)). '" and "'. date('Y-m-d', strtotime($hmin)).'"');
        $this->db->order_by('tanggal_bayar', 'asc');
        
        
        $data = array(
            'alarm' => $this->db->get('supplier')
        );
        
        $this->load->view('header/header');
        $this->load->view('dashboard', $data);
        $this->load->view('header/footer');
    }

    public function daftar_supplier()
    {
        $this->db->order_by('nama_supplier', 'desc');
        $data = array(
            'supplier' => $this->db->get('supplier'),
            );
        $this->load->view('header/header');
        $this->load->view('supplier/daftar_supplier',$data);
        $this->load->view('header/footer');
        
    }


        public function delete_supplier()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->where('toko',$this->session->userdata('toko'));
        
        if ($this->db->delete('supplier')) {
            $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">Data berhasil dihapus</div>');
            redirect('daftar_supplier');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">Data gagal dihapus</div>');
            redirect('daftar_supplier');
        }
        
    }
}

/* End of file Controllername.php */