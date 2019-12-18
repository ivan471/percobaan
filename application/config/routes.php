<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['signin'] 										= 'home/signin';
$route['login'] 										= 'home/login';
$route['detail_pesanan/(:any)'] 		= 'home/detail_pesanan/$1';
$route['barang/(:any)'] 						= 'stok_barang/index/$1';
$route['simpan_stok/(:any)']				= 'stok_barang/simpan/$1';
$route['bahan/(:any)'] 							= 'stok_bahan/index/$1';
$route['simpan_bahan/(:any)']				= 'stok_bahan/simpan/$1';
$route['Logout']										= 'home/Logout';
$route['produksi/(:num)/(:any)'] 					= 'stok_barang/produksi/$1/$2';
$route['produksi_stok/(:any)'] 			= 'stok_barang/produksi_stok/$1';
$route['tambah_stok/(:any)'] 			= 'stok_barang/tambah_stok/$1';
$route['riwayat'] 									= 'home/riwayat';
$route['proses/(:any)'] 						= 'stok_barang/proses_produksi/$1';
$route['view_barang'] 							= 'stok_barang/view_barang';
$route['view_bahan'] 								= 'stok_bahan/view_bahan';
$route['simpan'] 										= 'home/simpan';
$route['daftar'] 										= 'home/daftar';
$route['cetak/(:any)'] 										= 'faktur/index/$1';


$route['default_controller'] 				= 'home';
$route['404_override'] 							= '';
$route['translate_uri_dashes'] 			= FALSE;
