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

$routes->get('/petugas', 'PetugasController::petugas');
$routes->get('/petugas/motor', 'PetugasController::motor');
$routes->get('/petugas/customers', 'PetugasController::customers');

$routes->get('/petugas/data-motor', 'MotorController::index');
$routes->get('/petugas/input-data-motor', 'MotorController::inputDataMotor');
$routes->get('/petugas/harga-sewa', 'MotorController::hargaSewa');

$routes->get('/petugas/data-customers', 'CustomersController::customers');
$routes->get('/petugas/input-data-customers', 'CustomersController::input');
$routes->get('/petugas/transaksi', 'CustomersController::transaksi');
$routes->get('/petugas/laporan', 'CustomersController::laporan');