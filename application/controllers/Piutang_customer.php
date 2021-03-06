<?php


defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class piutang_customer extends CI_Controller {

   public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role')=='') {
            redirect('auth');
        }

    }

    // List all your items
    public function hutang()
    {
        if ($this->session->userdata('role')!='admin') {
            redirect('auth/notadmin');
        }

        $this->form_validation->set_rules('nama_perusahaan', 'nama_perusahaan', 'trim|required');
        $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'trim|required');
        $this->form_validation->set_rules('nominal', 'nominal', 'trim|required|numeric');
        
        
        if ($this->form_validation->run() == FALSE) {
            $data = array('tanggal' => date("Y-m-d") );
            $this->load->view('header/header');
            $this->load->view('piutang_customer/hutang',$data);
            $this->load->view('header/footer');
            
        } else {
            $data = array(
                'tanggal' => $this->input->post('tanggal'),
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'nominal_hutang' => $this->input->post('nominal'),
                'nominal_pembayaran' => 0,
                'keterangan' => $this->input->post('keterangan'),
                'toko' => $this->session->userdata('toko')
                );

            
            if ($this->db->insert('piutang_customer', $data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hutang customer berhasil ditambahkan</div>');
                redirect('hutang_customer');   
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Hutang customer gagal ditambahkan</div>');
                redirect('hutang_customer');
            }


        }
        
        
    }

    // Add a new item
    public function pembayaran()
    {
        if ($this->session->userdata('role')!='admin') {
            redirect('auth/notadmin');
        }
        $this->form_validation->set_rules('nama_perusahaan', 'nama_perusahaan', 'trim|required');
        $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'trim|required');
        $this->form_validation->set_rules('nominal', 'nominal', 'trim|required|numeric');
        
        
        if ($this->form_validation->run() == FALSE) {
            $data = array('tanggal' => date("Y-m-d") );
            $this->load->view('header/header');
            $this->load->view('piutang_customer/pembayaran',$data);
            $this->load->view('header/footer');
            
        } else {
            $data = array(
                'tanggal' => $this->input->post('tanggal'),
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'nominal_hutang' => 0,
                'nominal_pembayaran' => $this->input->post('nominal'),
                'keterangan' => $this->input->post('keterangan'),
                'toko' => $this->session->userdata('toko')
                );

            
            if ($this->db->insert('piutang_customer', $data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran customer berhasil ditambahkan</div>');
                redirect('pembayaran_customer');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pembayaran customer gagal ditambahkan</div>');
                redirect('pembayaran_customer');
            }


        }
    }

    //Update one item
    public function daftar_hutang()
    {

        $tanggal = $this->input->post('tanggal');
        $nama_perusahaan = $this->input->post('nama_perusahaan');

        $this->db->order_by('nama_barang', 'asc');
        
        $barang = $this->db->get('barang');
        $this->db->where('toko',$this->session->userdata('toko'));
        if ($tanggal != null) {
            $this->db->where('tanggal', $tanggal);
        }
        
        if ($nama_perusahaan != null) {
            $this->db->where('nama_perusahaan', $nama_perusahaan);
        }
        
        $this->db->order_by('id', 'desc');

        
        $data = array(
            'hutang_customer' => $this->db->get('piutang_customer'),
            'barang' => $barang
            );
        $this->load->view('header/header');
        $this->load->view('piutang_customer/daftar_hutang',$data);
        $this->load->view('header/footer');

       
        
        
    }

    //Delete one item
    public function delete_hutang_customer()
    {
        $id = $this->input->get('id');
        $this->db->where('toko',$this->session->userdata('toko'));
        $this->db->where('id', $id);
        
        if ($this->db->delete('piutang_customer')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
            redirect('daftar_hutang_customer');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus</div>');
            redirect('daftar_hutang_customer');
        }
    }
}

/* End of file piutang.php */