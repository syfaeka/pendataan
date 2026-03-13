<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Default Master data redirect
$routes->get('master', static function() {
    return redirect()->to('/master/negara');
});

// Master Data Dynamic Routes
$routes->group('master', static function ($routes) {
    // /master/negara
    $routes->get('(:segment)', 'Master::index/$1');
    // /master/negara/store
    $routes->post('(:segment)/store', 'Master::store/$1');
    // /master/negara/5/update
    $routes->post('(:segment)/(:num)/update', 'Master::update/$1/$2');
    // /master/negara/5/delete
    $routes->get('(:segment)/(:num)/delete', 'Master::delete/$1/$2');
});

// Transaction Routes
$routes->get('datapekerja', 'DataPekerja::index');
$routes->get('datapekerja/new', 'DataPekerja::create');
$routes->post('datapekerja', 'DataPekerja::store');
$routes->get('datapekerja/(:num)/edit', 'DataPekerja::edit/$1');
$routes->post('datapekerja/(:num)', 'DataPekerja::update/$1');
$routes->get('datapekerja/(:num)/delete', 'DataPekerja::delete/$1');

$routes->get('pengalaman', 'PengalamanPerusahaan::index');
$routes->get('pengalaman/new', 'PengalamanPerusahaan::create');
$routes->post('pengalaman', 'PengalamanPerusahaan::store');
$routes->get('pengalaman/(:num)/edit', 'PengalamanPerusahaan::edit/$1');
$routes->post('pengalaman/(:num)', 'PengalamanPerusahaan::update/$1');
$routes->get('pengalaman/(:num)/delete', 'PengalamanPerusahaan::delete/$1');
