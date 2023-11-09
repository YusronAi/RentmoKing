<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/login', 'User::index');
$routes->post('/auth', 'User::auth');
$routes->get('/logout', 'User::logout');
$routes->get('/registrasi', 'User::registrasi');
$routes->post('/register', 'User::register');
$routes->get('/profil', 'User::profil');
$routes->get('/user', 'User::users');
$routes->get('/data-user', 'User::data');

$routes->get('/', 'PetugasController::petugas');
$routes->get('/petugas/motor', 'PetugasController::motor');
$routes->get('/petugas/customers', 'PetugasController::customers');
$routes->get('/peraturan', 'PetugasController::peraturan');
$routes->get('/petugas/data-peminjaman', 'PetugasController::peminjaman');

$routes->get('/motor/data-motor', 'MotorController::index');
$routes->post('/motor/data-motor', 'MotorController::index');
$routes->get('/motor/input-data-motor', 'MotorController::inputDataMotor');
$routes->get('/motor/harga-sewa', 'MotorController::hargaSewa');
$routes->post('/motor/save', 'MotorController::save');
$routes->get('/motor/delete/(:num)', 'MotorController::delete/$1');

$routes->get('/petugas/data-customers', 'CustomersController::customers');
$routes->post('/petugas/data-customers', 'CustomersController::customers');
$routes->get('/petugas/input-data-customers', 'CustomersController::input');
$routes->get('/petugas/transaksi', 'CustomersController::transaksi');
$routes->get('/petugas/laporan', 'CustomersController::laporan');
$routes->post('/petugas/save', 'CustomersController::save');

$routes->get('/test', 'CustomersController::test');