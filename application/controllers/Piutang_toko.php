<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class piutang_toko extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

    }

    // List all your items
    public function hutang()
    {

        $this->form_validation->set_rules('nama_perusahaan', 'nama_perusahaan', 'trim|required');
        $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'trim|required');
        $this->form_validation->set_rules('nominal', 'nominal', 'trim|required|numeric');
        
        
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('header/header');
            $this->load->view('piutang_toko/hutang');
            $this->load->view('header/footer');
            
        } else {
            $data = array(
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'nominal_hutang' => $this->input->post('nominal'),
                'nominal_pembayaran' => 0,
                'keterangan' => $this->input->post('keterangan'),
                );

            
            if ($this->db->insert('piutang_toko', $data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hutang toko berhasil ditambahkan</div>');
                redirect('hutang_toko');   
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Hutang toko gagal ditambahkan</div>');
                redirect('hutang_toko');
            }


        }
        
        
    }

    // Add a new item
    public function pembayaran()
    {
        $this->form_validation->set_rules('nama_perusahaan', 'nama_perusahaan', 'trim|required');
        $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'trim|required');
        $this->form_validation->set_rules('nominal', 'nominal', 'trim|required|numeric');
        
        
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('header/header');
            $this->load->view('piutang_toko/pembayaran');
            $this->load->view('header/footer');
            
        } else {
            $data = array(
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'nominal_hutang' => 0,
                'nominal_pembayaran' => $this->input->post('nominal'),
                'keterangan' => $this->input->post('keterangan'),
                );

            
            if ($this->db->insert('piutang_toko', $data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran toko berhasil ditambahkan</div>');
                redirect('pembayaran_toko');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pembayaran toko gagal ditambahkan</div>');
                redirect('pembayaran_toko');
            }


        }
    }

    //Update one item
    public function daftar_hutang()
    {
        $data = array(
            'hutang_toko' => $this->db->get('piutang_toko'));
        $this->load->view('header/header');
        $this->load->view('piutang_toko/daftar_hutang',$data);
        $this->load->view('header/footer');
    }

    //Delete one item
    public function delete( $id = NULL )
    {

    }
}

/* End of file piutang.php */