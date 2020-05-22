<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Export_model extends CI_Model {

    public function getdata($tabel, $dari, $sampai)
    {
        $this->db->where('tanggal BETWEEN "'. date('Y-m-d', strtotime($dari)). '" and "'. date('Y-m-d', strtotime($sampai)).'"');
        return $this->db->get($tabel);
        
    }
    

}

/* End of file ModelName.php */