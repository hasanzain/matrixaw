<?php


defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Cek extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role')=='') {
            redirect('auth');
        }

    }

    // // List all your items
    // public function index()
    // {
        
        
    // }

    // Add a new item
    public function tambah_alarm()
    {
        if ($this->session->userdata('role')!='admin') {
            redirect('auth/notadmin');
        }

        $this->form_validation->set_rules('nama_supplier', 'nama_supplier', 'trim|required');
        $this->form_validation->set_rules('jumlah_bayar', 'jumlah_bayar', 'trim|required|numeric');
        $this->form_validation->set_rules('tanggal_bayar', 'tanggal_bayar', 'trim|required');
        
        if ($this->form_validation->run() == FALSE){ 
            $this->db->where('toko', $this->session->userdata('toko'));
            $this->db->order_by('nama_supplier', 'asc');
            $data = array(
            'supplier' => $this->db->get('supplier')
            
         );

            $this->load->view('header/header');
            $this->load->view('cek/tambah_alarm',$data);
            $this->load->view('header/footer');
        } else {
            $splitdate =  explode("-", $this->input->post('tanggal_bayar'));
            $data = array(
            'bulan' => $splitdate[1],
            'tahun' => $splitdate[0],
            'nama_supplier' => $this->input->post('nama_supplier'),
            'jumlah_bayar' => $this->input->post('jumlah_bayar'),
            'tanggal_bayar' => $this->input->post('tanggal_bayar'),
            'no_cek' => $this->input->post('no_cek'),
            'keterangan' => $this->input->post('keterangan'),
            'toko' => $this->session->userdata('toko')
         );
         
         if ($this->db->insert('cek', $data)) {
            $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">Data berhasil ditambahkan</div>');
            redirect('tambah_alarm');
         }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal ditambahkan</div>');
            redirect('tambah_alarm');
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
        $this->db->update('cek', $new);
        


        $now = date('Y-m-d');
        
        $hmin = date('Y-m-d', strtotime('+2 days', strtotime($now)));
        $this->db->where('toko',$this->session->userdata('toko'));
        $this->db->where('tanggal_bayar BETWEEN "'. date('Y-m-d', strtotime($now)). '" and "'. date('Y-m-d', strtotime($hmin)).'"');
        $this->db->order_by('tanggal_bayar', 'asc');
        
        
        $data = array(
            'alarm' => $this->db->get('cek')
        );
        
        $this->load->view('header/header');
        $this->load->view('dashboard', $data);
        $this->load->view('header/footer');
    }

    public function daftar_alarm()
    {
       
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $nama_supplier = $this->input->post('nama_supplier');

        $this->db->order_by('nama_supplier', 'asc');
        
        $supplier = $this->db->get('supplier');
        $this->db->where('toko',$this->session->userdata('toko'));
        if ($bulan != null) {
            $this->db->where('bulan', $bulan);
        }

        if ($tahun != null) {
            $this->db->where('tahun', $tahun);
        }
        
        if ($nama_supplier != null) {
            $this->db->where('nama_supplier', $nama_supplier);
        }
        
        $this->db->order_by('tanggal_bayar', 'asc');

        
        $data = array(
            'cek' => $this->db->get('cek'),
            'supplier' => $supplier
            );
        $this->load->view('header/header');
        $this->load->view('cek/daftar_alarm',$data);
        $this->load->view('header/footer');
        
    }
        

    //Delete one item
    public function delete()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->where('toko',$this->session->userdata('toko'));
        
        if ($this->db->delete('cek')) {
            redirect('dashboard');
        }else{
            redirect('dashboard');
        }
        
    }

        public function delete_cek()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->where('toko',$this->session->userdata('toko'));
        
        if ($this->db->delete('cek')) {
            $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">Data berhasil dihapus</div>');
            redirect('daftar_alarm');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">Data gagal dihapus</div>');
            redirect('daftar_alarm');
        }
        
    }
}

/* End of file Controllername.php */