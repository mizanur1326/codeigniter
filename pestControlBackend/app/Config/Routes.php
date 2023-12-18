<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


//Services Routes
$routes->get('services', 'ServiceController::index');
$routes->get('create', 'ServiceController::create');
$routes->post('store', 'ServiceController::store');
$routes->get('services/delete/(:num)', 'ServiceController::delete/$1');
$routes->get('services/edit/(:num)', 'ServiceController::edit/$1');
$routes->post('services/update/(:num)', 'ServiceController::update/$1');

