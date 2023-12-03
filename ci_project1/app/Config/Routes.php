<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AdminHome::index');
// $routes->get('/about', 'about::index');
// $routes->get('/contact', 'contact::index');
// $routes->get('/services', 'services::index');
$routes->get('/products', 'ProductController::index');
$routes->get('/create', 'ProductController::create');
$routes->post('/store', 'ProductController::store');

