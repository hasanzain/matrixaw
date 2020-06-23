<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class autocomplate extends CI_Controller {

    function getdatabarang()
    {
        $toko = $this->session->userdata('toko');
        $datacuti = $this->ajax_model->ambildatabarang($toko)->result();
        echo json_encode($datacuti);
    }

    function ambilkodebarang()
    {
        $nama_barang=$this->input->post('nama_barang');
        $where=array('nama_barang'=> $nama_barang);
        $toko = $this->session->userdata('toko');
        $databarang = $this->ajax_model->ambilid_barang('barang',$where, $toko)->result();
        echo json_encode($databarang);
    }

}

/* End of file Controllername.php */