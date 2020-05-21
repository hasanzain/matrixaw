<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_model extends CI_Model {

    function ambildata(){
     $result = $this->db->query('select * from barang order by nama asc');
     return $result;

 }


 function ambildatabarang(){
     $result = $this->db->query('select * from barang order by nama_barang asc');
     return $result;

 }
 function ambilid_barang($table, $where){
    return $this->db->get_where($table, $where);
}
}