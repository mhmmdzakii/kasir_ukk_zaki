<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/login-pengguna','Pengguna::login');
$routes->get('/logout','Home::logout');

//admin
$routes->get('/halaman-admin','Admin::dashboardAdmin',['filter' => 'otentifikasi']);
$routes->get('/halaman-kasir','Kasir::halamanKasir',['filter' => 'otentifikasi']);

//Master Data
$routes->get('/ListPengguna', 'Pengguna::TampilPengguna',['filter' => 'otentifikasi']);
$routes->get('/ListSatuan', 'Satuan::TampilSatuan',['filter' => 'otentifikasi']);
$routes->get('/ListKategori', 'Kategori::TampilKategori',['filter' => 'otentifikasi']);
$routes->get('/ListProduk', 'Produk::TampilProduk',['filter' => 'otentifikasi']);


//satuan brok
$routes->get('/tambah-satuan-barang', 'Satuan::TambahSatuan',['filter' => 'otentifikasi']);
$routes->get('/hapus-satuan-barang/(:num)', 'Satuan::HapusSatuan/$1',['filter' => 'otentifikasi']);
$routes->get('/edit-satuan/(:num)', 'Satuan::editSatuan/$1',['filter' => 'otentifikasi']);
$routes->post('/update-satuan','Satuan::UpdateSatuan',['filter' => 'otentifikasi']);
$routes->post('/simpan-satuan', 'Satuan::SimpanSatuan',['filter' => 'otentifikasi']);

//pengguna
$routes->get('/tambah-pengguna', 'Pengguna::TambahPengguna',['filter' => 'otentifikasi']);
$routes->get('/hapus-pengguna/(:num)', 'Pengguna::HapusPengguna/$1',['filter' => 'otentifikasi']);
$routes->post('/simpan-pengguna', 'Pengguna::SimpanPengguna',['filter' => 'otentifikasi']);
$routes->get('/edit-pengguna/(:num)', 'Pengguna::editPengguna/$1',['filter' => 'otentifikasi']);
$routes->post('/update-pengguna','Pengguna::UpdatePengguna',['filter' => 'otentifikasi']);
$routes->get('/edit-password-pengguna/(:any)','Pengguna::editpassPengguna/$1',['filter' => 'otentifikasi']);
$routes->post('/update-password-pengguna', 'Pengguna::updatepassPengguna',['filter' => 'otentifikasi']);

//kategori
$routes->get('/tambah-kategori', 'Kategori::TambahKategori',['filter' => 'otentifikasi']);
$routes->get('/hapus-kategori/(:num)', 'Kategori::HapusKategori/$1',['filter' => 'otentifikasi']);
$routes->get('/edit-kategori/(:num)', 'Kategori::editkategori/$1',['filter' => 'otentifikasi']);
$routes->post('/update-kategori','Kategori::UpdateKategori',['filter' => 'otentifikasi']);
$routes->post('/simpan-kategori', 'Kategori::SimpanKategori',['filter' => 'otentifikasi']);

// Produk
$routes->get('/tambah-produk', 'Produk::tambahProduk',['filter' => 'otentifikasi']);
$routes->get('/produk', 'Produk::Produk',['filter' => 'otentifikasi']);
$routes->get('/hapus-produk/(:num)', 'Produk::HapusProduk/$1',['filter' => 'otentifikasi']);
$routes->post('/simpan-produk', 'Produk::simpanProduk',['filter' => 'otentifikasi']);
$routes->get('/edit-produk/(:num)', 'Produk::editProduk/$1',['filter' => 'otentifikasi']);
$routes->post('/update-produk', 'Produk::updateProduk',['filter' => 'otentifikasi']);

// Penjualan
$routes->get('/transaksi-penjualan','Penjualan::index',['filter'=>'otentifikasi']);
$routes->post('/transaksi-penjualan','Penjualan::simpanPenjualan',['filter'=>'otentifikasi']);
$routes->get('/pembayaran','Penjualan::simpanPembayaran',['filter'=>'otentifikasi']);

//Laporan
$routes->get('/ListLaporan', 'Laporan::tampilLaporan',['filter'=>'otentifikasi']);
$routes->get('/catak-laporan-stok','Produk::laporanStok',['filter'=>'otentifikasi']);

// pdf laporan
$routes->get('/pdf_view', 'PdfController::index');
$routes->get('/pdf/generate', 'PdfController::generate');