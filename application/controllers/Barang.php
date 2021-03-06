<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role')=='') {
            redirect('auth');
        }

    }

    // List all your items
    public function stok_barang()
    {
        $data = array(
            'stok_barang' => $this->db->get('stok_barang')
        );
        $this->load->view('header/header');    
        $this->load->view('barang/stok_barang',$data);
        $this->load->view('header/footer');    
    }

    public function mutasi_barang()
    {
        $tanggal = $this->input->post('tanggal');
        $nama_barang = $this->input->post('nama_barang');

        $this->db->order_by('nama_barang', 'asc');
        
        $barang = $this->db->get('barang');
        $this->db->where('toko',$this->session->userdata('toko'));
        if ($tanggal != null) {
            $this->db->where('tanggal', $tanggal);
        }
        
        if ($nama_barang != null) {
            $this->db->where('nama_barang', $nama_barang);
        }
        
        $this->db->order_by('id', 'desc');
        
        $data = array(
            'stok_barang' => $this->db->get('mutasi_barang'),
            'barang' => $barang,
            
        );
        $this->load->view('header/header');    
        $this->load->view('barang/mutasi_barang',$data);
        $this->load->view('header/footer');    
    }

        public function barang_masuk()
    {
        $cari = $this->input->post('cari');
        if ($cari == '') {
            $this->db->where('toko', $this->session->userdata('toko'));
            $supplier =$this->db->get('supplier');
            $this->db->order_by('nama_barang', 'asc');
            $data = array(
                'barang' => $this->db->get('barang'),
                'tanggal' => date("Y-m-d"),
                'supplier' => $supplier
            );
            $this->load->view('header/header');    
            $this->load->view('barang/barang_masuk', $data);
            $this->load->view('header/footer');
        }else{
            $search = explode(' ',$cari);
            foreach ($search as &$value) {
                
            }
            $query = $this->db->query("SELECT * FROM barang WHERE nama_barang LIKE '%$search[0]%' and nama_barang LIKE '%$search[1]%'");
            $this->db->where('toko', $this->session->userdata('toko'));
            $supplier =$this->db->get('supplier');
            $data = array(
                'barang' => $query,
                'tanggal' => date("Y-m-d"),
                'supplier' => $supplier
            );
            $this->load->view('header/header');    
            $this->load->view('barang/barang_masuk', $data);
            $this->load->view('header/footer');
        }
        
    }
    // Add a new item
    public function barang_masuk_isi()
    {
        if ($this->session->userdata('role')!='admin') {
            redirect('auth/notadmin');
        }
        
        $this->form_validation->set_rules('price_list', 'price_list', 'trim|required');
        $this->form_validation->set_rules('jumlah_beli', 'jumlah_beli', 'trim|required|numeric');
        $this->form_validation->set_rules('net', 'net', 'trim|required|numeric');
       
        
        if ($this->form_validation->run() == false) {
            $this->db->where('toko', $this->session->userdata('toko'));
            $supplier =$this->db->get('supplier');
            $this->db->order_by('nama_barang', 'asc');
            $data = array(
                'barang' => $this->db->get('barang'),
                'supplier' => $supplier,
                'tanggal' => date("Y-m-d"),
                );

            $this->load->view('header/header');    
            $this->load->view('barang/barang_masuk', $data);
            $this->load->view('header/footer'); 
        } else {
            
            //mencari stok terakhir
            $nama_barang = $this->input->post('nama_barang');
            $jumlah_masuk = $this->input->post('jumlah_beli');
            $this->db->where('toko',$this->session->userdata('toko'));
            $this->db->where('nama_barang', $nama_barang);
            $query = $this->db->get('stok_barang')->result_array();
            $stok_terakhir = "";
            foreach ($query as $key) {
                $stok_terakhir =  $key['jumlah_stok'];
            }
            //mencari stok terakhir

            $update_stok = $stok_terakhir + $jumlah_masuk;
            $barang_masuk = array(
                'tanggal' => $this->input->post('tanggal'),
                'supplier' => $this->input->post('supplier'), 
                'nama_barang' => $this->input->post('nama_barang'), 
                'kode_barang' => $this->input->post('kode_barang'), 
                'price_list' => $this->input->post('price_list'), 
                'diskon1' => $this->input->post('diskon1'), 
                'diskon2' => $this->input->post('diskon2'), 
                'diskon3' => $this->input->post('diskon3'), 
                'diskon4' => $this->input->post('diskon4'), 
                'ppn' => $this->input->post('ppn'), 
                'net' => $this->input->post('net'), 
                'jumlah_beli' => $this->input->post('jumlah_beli'), 
                'total' => $this->input->post('total'), 
                'keterangan' => $this->input->post('keterangan'),
                'toko' => $this->session->userdata('toko')
            );


            $stok_barang = array(
                'tanggal' => $this->input->post('tanggal'), 
                'kode_barang' => $this->input->post('kode_barang'), 
                'jumlah_stok' => $update_stok
            );

            $data_mutasi = array(
                'tanggal' => $this->input->post('tanggal'), 
                'nama_barang' => $nama_barang, 
                'kode_barang' => $this->input->post('kode_barang'), 
                'harga_beli' => $this->input->post('net'), 
                'jumlah_masuk' => $this->input->post('jumlah_beli'),
                'toko' => $this->session->userdata('toko')
            );

            $insert_barang_masuk = $this->db->insert('barang_masuk', $barang_masuk);
            $this->db->where('toko',$this->session->userdata('toko'));    
            $this->db->where('nama_barang', $nama_barang);
            $update = $this->db->update('stok_barang', $stok_barang);
            $insert = $this->db->insert('mutasi_barang', $data_mutasi);
            if ($update && $insert && $insert_barang_masuk) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Stok berhasil ditambahkan</div>');
                redirect('barang_masuk');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Stok gagat ditambahkan</div>');
                redirect('barang_masuk');
            }

        }
        
    }

    public function daftar_barang_masuk()
    {
        $this->db->order_by('nama_supplier', 'asc');
        $supplier = $this->db->get('supplier');
        $nama_supplier = $this->input->post('nama_supplier');
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        
        $this->db->where('toko',$this->session->userdata('toko'));
        if ($nama_supplier != null) {
            $this->db->where('supplier', $nama_supplier);

        }
        
        if ($dari != null and $sampai != null) {
            $this->db->where('tanggal BETWEEN "'. date('Y-m-d', strtotime($dari)). '" and "'. date('Y-m-d', strtotime($sampai)).'"');

        }

        $this->db->order_by('id', 'desc');
        $data = array(
            'barang_masuk' => $this->db->get('barang_masuk'),
            'supplier' => $supplier
         );
        
        $this->load->view('header/header');    
        $this->load->view('barang/daftar_barang_masuk',$data);
        $this->load->view('header/footer'); 
        
    }

    public function delete_barang_masuk( $id = NULL )
    {
        $id = $this->input->get('id');
        $this->db->where('toko',$this->session->userdata('toko'));
        $this->db->where('id', $id);
        $barang_masuk = $this->db->get('barang_masuk');
        $kode_barang=0;
        $stoklama=0;
        $stokmasuk=0;
        $stokbaru=0;

        foreach ($barang_masuk->result_array() as $key) {
            $kode_barang = $key['kode_barang'];
            $stokmasuk = $key['jumlah_beli'];
        }

        $this->db->where('kode_barang',$kode_barang);
        $stok = $this->db->get('stok_barang');
        foreach ($stok->result_array() as $key) {
            $stoklama = $key['jumlah_stok'];
        }
        $stokbaru = $stoklama - $stokmasuk;


        
        $this->db->where('id', $id);
        if ($this->db->delete('barang_masuk')) {
            $data = array('jumlah_stok' => $stokbaru);
            $this->db->where('kode_barang', $kode_barang);
            $this->db->update('stok_barang', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
            redirect('daftar_barang_masuk');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus</div>');
            redirect('daftar_barang_masuk');
        }
        

    }

    public function order_barang()
    {
        $this->load->view('header/header');    
        $this->load->view('barang/order_barang');
        $this->load->view('header/footer'); 
    }

    //Update one item
    public function retur_barang()
    {
        if ($this->session->userdata('role')!='admin') {
            redirect('auth/notadmin');
        }
        
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'trim|required');
        $this->form_validation->set_rules('kode_barang', 'kode_barang', 'trim|required');
        $this->form_validation->set_rules('jumlah_barang', 'jumlah_barang', 'trim|required|numeric');
        $this->form_validation->set_rules('harga_satuan', 'harga_satuan', 'trim|required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $data = array('tanggal' => date("Y-m-d") );
            $this->load->view('header/header');
            $this->load->view('barang/retur_barang',$data);
            $this->load->view('header/footer');
            
        } else {
            $nama_barang = $this->input->post('nama_barang');
            $kode_barang = $this->input->post('kode_barang');
            $jumlah_barang = $this->input->post('jumlah_barang');
            $harga_satuan = $this->input->post('harga_satuan');
            $keterangan = $this->input->post('keterangan');
            

            //mencari stok terakhir
            $this->db->where('toko',$this->session->userdata('toko'));
            $this->db->where('nama_barang', $nama_barang);
            $query = $this->db->get('stok_barang')->result_array();
            $stok_terakhir = "";
            foreach ($query as $key) {
                $stok_terakhir =  $key['jumlah_stok'];
            }
            //mencari stok terakhir
            $update_stok = $stok_terakhir + $jumlah_barang;


            $stok_barang = array(
                'tanggal' => date("Y-m-d"), 
                'kode_barang' => $this->input->post('kode_barang'), 
                'harga_satuan' => $this->input->post('net'), 
                'jumlah_stok' => $update_stok
            );

            $data_mutasi = array(
                'tanggal' => date("Y-m-d"), 
                'nama_barang' => $nama_barang, 
                'kode_barang' => $kode_barang, 
                'harga_satuan' => $harga_satuan, 
                'jumlah_masuk' => $jumlah_barang,
                'keterangan' => $keterangan
            );

            $this->db->where('toko',$this->session->userdata('toko'));
            $this->db->where('nama_barang', $nama_barang);
            $update = $this->db->update('stok_barang', $stok_barang);
            $insert = $this->db->insert('mutasi_barang', $data_mutasi);

            if ($update && $insert) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Stok berhasil ditambahkan</div>');
                redirect('retur_barang');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Stok gagat ditambahkan</div>');
                redirect('retur_barang');
            }
            
            
            
            
            
        }
        
    }

        public function delete_mutasi( $id = NULL )
    {
        $id = $this->input->get('id');
        $this->db->where('toko',$this->session->userdata('toko'));
        $this->db->where('id', $id);
        
        if ($this->db->delete('mutasi_barang')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
            redirect('mutasi_barang');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus</div>');
            redirect('mutasi_barang');
        }
        

    }

     public function edit_stok( $id = NULL )
    {
        $id = $this->input->get('id');
        $id_post = $this->input->post('id');
        $this->db->where('toko',$this->session->userdata('toko'));
        $this->db->where('id', $id);
        
        $data = array(
            'stok_barang' => $this->db->get('stok_barang')
        );
        if ($id != "") {
            $this->load->view('header/header'); 
            $this->load->view('barang/edit_stok',$data);
            $this->load->view('header/footer');
        }elseif ($id_post != ""){
            $data = array(
                'jumlah_stok' => $this->input->post('jumlah_stok'),
            );
            $this->db->where('toko',$this->session->userdata('toko'));
            $this->db->where('id', $id_post);
           if ($this->db->update('stok_barang', $data)){
               $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
               redirect('stok_barang');

           }else{
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal diubah</div>');
               redirect('stok_barang');
           }  

        }
        
    }
}

/* End of file Controllername.php */