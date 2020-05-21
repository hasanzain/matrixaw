<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class autocomplate extends CI_Controller {

    function getdatabarang()
    {
        $datacuti = $this->ajax_model->ambildatabarang()->result();
        echo json_encode($datacuti);
    }

    function ambilkodebarang()
    {
        $nama_barang=$this->input->post('nama_barang');
        $where=array('nama_barang'=> $nama_barang);
        $databarang = $this->ajax_model->ambilid_barang('barang',$where)->result();
        echo json_encode($databarang);
    }

}

/* End of file Controllername.php */