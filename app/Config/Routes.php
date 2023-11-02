<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');
$routes->get('/login', 'User::index');
$routes->post('/auth', 'User::auth');
$routes->get('/logout', 'User::logout');
$routes->get('/registrasi', 'User::registrasi');
$routes->post('/register', 'User::register');
