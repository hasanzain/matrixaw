<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_model extends CI_Model {

    function ambildata($toko){
    $toko;
     $result = $this->db->query("select * from barang where toko = '$toko' order by nama asc");
     return $result;

 }


 function ambildatabarang($toko){
     $toko;
     $result = $this->db->query("select * from barang where toko = '$toko' order by nama_barang asc");
     return $result;

 }
 function ambilid_barang($table, $where, $toko){
    return $this->db->get_where($table, $where);
}
}