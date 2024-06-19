<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'login']);
$routes->get('/siswa/tambah', 'Siswa::tambah');
$routes->get('/siswa/(:num)', 'Siswa::edit/$1');
$routes->get('/siswa/save', 'Siswa::save');
$routes->delete('siswa/(:num)', 'Siswa::hapus/$1');

$routes->get('/guru/create', 'Guru::create');
$routes->get('/guru/(:num)', 'Guru::edit/$1');
$routes->get('/guru/save', 'Guru::save');
$routes->delete('guru/(:num)', 'Guru::hapus/$1');

$routes->get('admin/profile', 'Admin::profile');


