<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/login', 'Logout::login');
$routes->get('/', 'Login::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->post('/processlogin', 'Login::processLogin');
$routes->get('/unauthorized', 'Login::unauthorized');
$routes->get('/login', 'Login::index');
$routes->post('/Login/login', 'Login::login');
$routes->get('/logout', 'Login::logout');

// routes kelola user
$routes->get('/kelola-user', 'KelolaUser::index');
$routes->get('/kelola-user/tambah', 'KelolaUser::tambah');
$routes->post('/kelola-user/simpan', 'KelolaUser::simpan');
$routes->get('/kelola-user/edit/(:num)', 'KelolaUser::edit/$1');
$routes->post('/kelola-user/update/(:num)', 'KelolaUser::update/$1');
$routes->delete('/kelola-user/(:num)', 'KelolaUser::hapus/$1');

// routes survei
$routes->get('/survei', 'Survei::index');
$routes->get('/survei/tambah', 'Survei::tambah');
$routes->post('/survei/simpan', 'Survei::simpan');
$routes->get('/survei/edit/(:num)', 'Survei::edit/$1');
$routes->post('/survei/update/(:num)', 'Survei::update/$1');
$routes->delete('/survei/(:num)', 'Survei::hapus/$1');
$routes->get('/survei/cetakpdf', 'Survei::cetakPdf');
$routes->get('/survei/cetakexcel', 'Survei::cetakExcel');
$routes->get('/survei/laporan', 'Survei::Laporan');

$routes->get('/biodata', 'Biodata::index');
$routes->get('/biodata/tambah', 'Biodata::tambah'); // Menambahkan parameter ID untuk edit
$routes->post('/biodata/simpan', 'Biodata::simpan');
$routes->get('/biodata/hapus/(:num)', 'Biodata::hapus/$1');
$routes->get('/biodata/edit/(:num)', 'Biodata::edit/$1');
$routes->put('/biodata/update/(:num)', 'Biodata::update/$1');
$routes->get('/biodata/edit', 'Biodata::edit'); 
$routes->post('/biodata/simpan', 'Biodata::simpan');







