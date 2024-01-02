<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('login', 'User::index');
$routes->post('auth', 'User::auth');

$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('logout', 'User::logout');
    $routes->get('registrasi', 'User::registrasi');
    $routes->post('register', 'User::register');
    $routes->get('profil', 'User::profil');
    $routes->get('user', 'User::users');
    $routes->get('data-user', 'User::data');
    $routes->get('data-user/delete/(:num)', 'User::delete/$1');
    $routes->get('data-user/ubah/(:any)', 'User::ubah/$1');
    $routes->post('data-user/update/(:any)', 'User::update/$1');

    $routes->get('peraturan', 
    'PetugasController::peraturan');
    $routes->get('/', 'PetugasController::petugas');
    $routes->get('test', 'CustomersController::test');
});

$routes->group('petugas', ['filter' => 'auth'], static function ($routes) {
    $routes->get('motor', 'PetugasController::motor');
    $routes->get('customers', 'PetugasController::customers');
    $routes->get('data-peminjaman', 'PetugasController::peminjaman');

    $routes->get('data-customers', 'CustomersController::customers');
    $routes->post('data-customers', 'CustomersController::customers');
    $routes->get('input-data-customers', 'CustomersController::input');
    $routes->get('delete-customer/(:any)', 'CustomersController::delete/$1');
    
    $routes->get('ubah/(:any)', 'CustomersController::ubah/$1');
    $routes->post('update/(:any)', 'CustomersController::update/$1');

    $routes->get('transaksi', 'TransaksiController::transaksi');
    $routes->post('transaksi', 'TransaksiController::transaksi');
    $routes->get('input-transaksi', 'TransaksiController::input');
    $routes->post('transaksi-save', 'TransaksiController::transaksiSave');
    $routes->get('detail-transaksi', 'TransaksiController::detail');
    $routes->get('delete/(:any)', 'TransaksiController::delete/$1');

    $routes->get('total-biaya', 'TransaksiController::totalBiaya');


    $routes->get('invoice', 'TransaksiController::view_pdf');
    $routes->get('cetak', 'TransaksiController::cetak');
    $routes->get('laporan', 'CustomersController::laporan');
    $routes->post('save', 'CustomersController::save');
});

$routes->group('motor', ['filter' => 'auth'], static function ($routes) {
    $routes->get('data-motor', 'MotorController::index');
    $routes->post('data-motor', 'MotorController::index');
    $routes->get('input-data-motor', 'MotorController::inputDataMotor');
    $routes->get('harga-sewa', 'MotorController::hargaSewa');
    $routes->post('save', 'MotorController::save');
    $routes->get('delete/(:num)', 'MotorController::delete/$1');

    $routes->get('ubah/(:any)', 'MotorController::ubah/$1');
    $routes->post('update/(:any)', 'MotorController::update/$1');
});



// $routes->get('/login', 'User::index');
// $routes->post('/auth', 'User::auth');
// $routes->get('/logout', 'User::logout');
// $routes->get('/registrasi', 'User::registrasi');
// $routes->post('/register', 'User::register');
// $routes->get('/profil', 'User::profil');
// $routes->get('/user', 'User::users');
// $routes->get('/data-user', 'User::data');

// $routes->get('/', 'PetugasController::petugas', ['filter' => 'auth']);
// $routes->get('/petugas/motor', 'PetugasController::motor');
// $routes->get('/petugas/customers', 'PetugasController::customers');
// $routes->get('/peraturan', 'PetugasController::peraturan');
// $routes->get('/petugas/data-peminjaman', 'PetugasController::peminjaman');

// $routes->get('/motor/data-motor', 'MotorController::index');
// $routes->post('/motor/data-motor', 'MotorController::index');
// $routes->get('/motor/input-data-motor', 'MotorController::inputDataMotor');
// $routes->get('/motor/harga-sewa', 'MotorController::hargaSewa');
// $routes->post('/motor/save', 'MotorController::save');
// $routes->get('/motor/delete/(:num)', 'MotorController::delete/$1');

// $routes->get('/petugas/data-customers', 'CustomersController::customers');
// $routes->post('/petugas/data-customers', 'CustomersController::customers');
// $routes->get('/petugas/input-data-customers', 'CustomersController::input');
// $routes->get('/petugas/transaksi', 'CustomersController::transaksi');
// $routes->get('/petugas/laporan', 'CustomersController::laporan');
// $routes->post('/petugas/save', 'CustomersController::save');

// $routes->get('/test', 'CustomersController::test');