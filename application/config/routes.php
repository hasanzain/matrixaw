<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'cek/list_alarm';
$route['penjualan_harian'] = 'laporan_keuangan/penjualan_harian';
$route['penjualan'] = 'laporan_keuangan/penjualan';
$route['form_laporan'] = 'laporan_keuangan/form_laporan';
$route['laporan_penjualan'] = 'laporan_keuangan/laporan_penjualan';
$route['data_penjualan'] = 'laporan_keuangan/data_penjualan';
$route['data_pengeluaran'] = 'laporan_keuangan/data_pengeluaran';
$route['delete_pengeluaran'] = 'laporan_keuangan/delete_pengeluaran';
$route['pengeluaran'] = 'laporan_keuangan/pengeluaran';
$route['edit_penjualan'] = 'laporan_keuangan/edit_penjualan';
$route['delete_penjualan'] = 'laporan_keuangan/delete_penjualan';
$route['order_barang'] = 'barang/order_barang';
$route['barang_masuk'] = 'barang/barang_masuk';
$route['barang_masuk_isi'] = 'barang/barang_masuk_isi';
$route['stok_barang'] = 'barang/stok_barang';
$route['mutasi_barang'] = 'barang/mutasi_barang';
$route['retur_barang'] = 'barang/retur_barang';
$route['delete_mutasi'] = 'barang/delete_mutasi';
$route['edit_stok'] = 'barang/edit_stok';
$route['daftar_barang_masuk'] = 'barang/daftar_barang_masuk';
$route['delete_barang_masuk'] = 'barang/delete_barang_masuk';
$route['hutang_customer'] = 'piutang_customer/hutang';
$route['delete_hutang_customer'] = 'piutang_customer/delete_hutang_customer';
$route['pembayaran_customer'] = 'piutang_customer/pembayaran';
$route['daftar_hutang_customer'] = 'piutang_customer/daftar_hutang';
$route['hutang_toko'] = 'piutang_toko/hutang';
$route['delete_hutang_toko'] = 'piutang_toko/delete_hutang_toko';
$route['pembayaran_toko'] = 'piutang_toko/pembayaran';
$route['daftar_hutang_toko'] = 'piutang_toko/daftar_hutang';
$route['daftar_inventory'] = 'inventory/daftar_inventory';
$route['tambah_inventory'] = 'inventory/tambah_inventory';
$route['delete_inventory'] = 'inventory/delete_inventory';
$route['update_inventory'] = 'inventory/update_inventory';
$route['tambah_alarm'] = 'cek/tambah_alarm';
$route['dashboard'] = 'cek/list_alarm';
$route['daftar_alarm'] = 'cek/daftar_alarm';
$route['bayar_cek'] = 'cek/delete';
$route['delete_cek'] = 'cek/delete_cek';
$route['report'] = 'report';
$route['export'] = 'report/export';
$route['pengambilan_cat'] = 'mixing/pengambilan_cat';
$route['penjualan_mixing'] = 'mixing/penjualan_mixing';
$route['data_mixing'] = 'mixing/data_mixing';
$route['edit_mixing'] = 'mixing/edit_mixing';
$route['delete_mixing'] = 'mixing/delete_mixing';
$route['tambah_user'] = 'auth/tambah_user';
$route['daftar_user'] = 'auth/daftar_user';
$route['delete_user'] = 'auth/delete_user';
$route['tambah_supplier'] = 'supplier/tambah_supplier';
$route['daftar_supplier'] = 'supplier/daftar_supplier';
$route['delete_supplier'] = 'supplier/delete_supplier';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;