<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');

// routes satker
$routes->group('user', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Satker\DashboardController::index');
    $routes->get('panduan', 'Satker\PanduanController::index');
    $routes->get('Satker/PanduanController/displayPdf', 'Satker\PanduanController::displayPdf');
    $routes->get('daftar', 'Satker\DaftarController::index');
    $routes->get('order', 'Satker\BuatController::index');
    $routes->post('buat/create', 'Satker\BuatController::create');
    // Other admin routes...
});


// Authentication routes
$routes->get('/login', 'AuthController::login');
$routes->post('/auth/attemptLogin', 'AuthController::attemptLogin');
$routes->get('/logout', 'AuthController::logout');

// Registration routes
$routes->get('/register', 'RegisterController::register');
$routes->post('/register/attemptRegister', 'RegisterController::attemptRegister');

// Admin routes
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('home', 'Admin\HomeController::index'); // Halaman home admin
    $routes->get('orders', 'Admin\OrderController::index'); // Daftar pengajuan

    // Rute untuk menyetujui dan menolak pengajuan
    $routes->get('order/approve/(:num)', 'Admin\OrderController::approve/$1'); // Menyetujui pengajuan
    $routes->get('order/reject/(:num)', 'Admin\OrderController::reject/$1');   // Menolak pengajuan

    // Tambahkan rute untuk daftar pengajuan masuk dan ditolak
    $routes->get('orders/incoming', 'Admin\OrderController::incoming'); // Daftar pengajuan masuk
    $routes->get('orders/rejected', 'Admin\OrderController::rejected'); // Daftar pengajuan ditolak

    $routes->get('profile', 'Admin\ProfileController::profile');
    $routes->post('profile/edit', 'Admin\ProfileController::updateProfile');
});


// SuperAdmin routes
$routes->group('superadmin', ['filter' => 'auth'], function($routes) {
    $routes->get('home', 'SuperAdmin\HomeController::index');
    $routes->get('orders', 'SuperAdmin\OrderController::index');
    $routes->get('order/updateStatus/(:num)/(:alpha)', 'SuperAdmin\OrderController::updateStatus/$1/$2');
    $routes->get('orders/incoming', 'Superadmin\OrderController::incoming');
    $routes->get('orders/completed', 'superadmin\OrderController::completed');
    $routes->get('profile', 'SuperAdminController::profile');
    $routes->post('profile/edit', 'SuperAdminController::updateProfile');

});
