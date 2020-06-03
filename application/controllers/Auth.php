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
                   'role' => $user['role']
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

}

/* End of file Controllername.php */