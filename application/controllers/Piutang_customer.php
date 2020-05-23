<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class piutang_customer extends CI_Controller {

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
            $this->load->view('piutang_customer/hutang');
            $this->load->view('header/footer');
            
        } else {
            $data = array(
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'nominal_hutang' => $this->input->post('nominal'),
                'nominal_pembayaran' => 0,
                'keterangan' => $this->input->post('keterangan'),
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
        $this->form_validation->set_rules('nama_perusahaan', 'nama_perusahaan', 'trim|required');
        $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'trim|required');
        $this->form_validation->set_rules('nominal', 'nominal', 'trim|required|numeric');
        
        
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('header/header');
            $this->load->view('piutang_customer/pembayaran');
            $this->load->view('header/footer');
            
        } else {
            $data = array(
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'nominal_hutang' => 0,
                'nominal_pembayaran' => $this->input->post('nominal'),
                'keterangan' => $this->input->post('keterangan'),
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

        
        if($tanggal == null){
            $data = array(
                'hutang_customer' => null
                );
            $this->load->view('header/header');
            $this->load->view('piutang_customer/daftar_hutang',$data);
            $this->load->view('header/footer');
        }
        else{

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Laporan tanggal '.$tanggal.'</div>');
            $this->db->where('tanggal', $tanggal);
            $data = array(
            'hutang_customer' => $this->db->get('piutang_customer'));
            $this->load->view('header/header');
            $this->load->view('piutang_customer/daftar_hutang',$data);
            $this->load->view('header/footer');
            }
        
        
    }

    //Delete one item
    public function delete( $id = NULL )
    {

    }
}

/* End of file piutang.php */