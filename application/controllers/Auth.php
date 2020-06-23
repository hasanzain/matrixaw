<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

    public function index()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        
        
        if ($this->form_validation->run() == FALSE) {
        $this->load->view('auth');
        } else {
        $this->_login();
        }

        
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->db->where('email', $email);
        $user = $this->db->get('user')->row_array();
        if ($user) {
           if (password_verify($password,$user['password'])) {
               $data = array(
                   'email' => $user['email'],
                   'role' => $user['role'],
                   'toko' => $user['toko']
                 );
                 
                 $this->session->set_userdata($data);
                 redirect('dashboard');
           }else{
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">password salah</div>');
            redirect('auth');
           }
        }else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">email tidak terdaftar</div>');
            redirect('auth');
            
        }
        
    }
        public function logout()
    {
        
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        redirect('auth');
        
    }
    public function notadmin()
    {
        $this->load->view('notadmin');
        
    }

    public function tambah_user()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header/header');
            $this->load->view('user/tambah_user');
            $this->load->view('header/footer');
        } else {
            $data = array(
                'email' => htmlspecialchars($this->input->post('email',true)),
                'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                'role' => $this->input->post('role'),
                'toko' => $this->input->post('toko'),
             );

             
             if ($this->db->insert('user', $data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil ditambahkan</div>');
                redirect('tambah_user');
             }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User gagal ditambahkan</div>');
                redirect('tambah_user');
             }
             
        }

        
    }
    
    public function daftar_user()
        {
            $this->db->where('toko', $this->session->userdata('toko'));
            
            $data = array('user' => $this->db->get('user'));
            
            $this->load->view('header/header');
            $this->load->view('user/daftar_user',$data);
            $this->load->view('header/footer');
        }

    public function delete_user()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('user');
        redirect('daftar_user');
        
        
        
    }
        

}

/* End of file Controllername.php */