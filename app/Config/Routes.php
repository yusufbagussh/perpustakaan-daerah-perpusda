<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Pages::index');

/**
 * Manajemen Buku Route
 */
$routes->get('/buku/index', 'Buku::index', ['filter' => 'role:admin']);
$routes->get('/buku/tambah', 'Buku::tambah');
$routes->post('/buku/simpan', 'Buku::simpan');
$routes->get('/buku/ubah/(:segment)', 'Buku::ubah/$1');
$routes->get('/buku/update/(:segment)', 'Buku::update/$1');
$routes->get('/buku/delete/(:num)', 'Buku::delete/$1');
$routes->get('/buku/detail/(:any)', 'Buku::detail/$1');

/**
 * Majanemen Kategori Buku Route
 */
$routes->get('/kategori/index', 'Kategori::index');
$routes->get('/kategori/tambahkategori', 'Kategori::tambahKategori');
$routes->post('/kategori/simpankategori', 'Kategori::simpanKategori');
$routes->get('/kategori/ubahkategori/(:num)', 'Kategori::ubahKategori');
$routes->post('/kategori/updatekategori/(:num)', 'Kategori::updateKategori');
$routes->post('/kategori/hapuskategori/(:num)', 'Kategori::hapusKategori');

/**
 * Manajemen Anggota Perpustakaan
 */
$routes->get('/anggota/index', 'Anggota::index');
$routes->get('/anggota/tambahanggota', 'Anggota::tambahAnggota');
$routes->post('/anggota/simpananggota', 'Anggota::simpanAnggota');
$routes->get('/anggota/ubahanggota/(:num)', 'Anggota::ubahAnggota');
$routes->post('/anggota/updateanggota/(:num)', 'Anggota::updateAnggota');
$routes->post('/anggota/hapusanggota/(:num)', 'Anggota::hapusAnggota');

/**
 * Manajemen Peminjaman Buku
 */
$routes->get('/pinjamkembali/index/(:segment)', 'PinjamKembali::index/$1');
$routes->post('/pinjamkembali/simpan/(:segment)', 'PinjamKembali::simpan/$1');
$routes->get('/pinjamkembali/ubah/(:num)', 'PinjamKembali::ubah/$1');
$routes->post('/pinjamkembali/update/(:num)', 'PinjamKembali::update/$1');
$routes->get('/pinjamkembali/status', 'PinjamKembali::status');
$routes->get('/pinjamkembali/listpinjamkembali', 'PinjamKembali::listPinjamKembali');


/**
 * Tampilan Daftar Buku Member
 */
$routes->get('/buku/listbukuanggota', 'Buku::listbukuanggota');
$routes->get('/buku/detailbukuanggota/(:any)', 'Buku::detailbukuanggota/$1');

//$routes->get('/buku/(:num)', 'Buku::detail/$1');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
