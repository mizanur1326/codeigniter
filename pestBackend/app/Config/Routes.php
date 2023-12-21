<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'authGuard']);


//Services Routes
$routes->get('services', 'ServiceController::index' , ['filter' => 'authGuard']);
$routes->get('create', 'ServiceController::create' , ['filter' => 'authGuard']);
$routes->post('store', 'ServiceController::store', ['filter' => 'authGuard']);
$routes->get('services/delete/(:num)', 'ServiceController::delete/$1');
$routes->get('services/edit/(:num)', 'ServiceController::edit/$1');
$routes->post('services/update/(:num)', 'ServiceController::update/$1');


//Signup /Signin
$routes->get('signup', 'SignupController::index');
$routes->match(['get', 'post'], 'signup/store', 'SignupController::store');

$routes->get('signin', 'SigninController::index');
$routes->post('login', 'SigninController::login');
$routes->get('signout', 'SigninController::logout');



//FrontEnd Routes
$routes->get('allService', 'frontEnd\ServiceController::index');
$routes->get('allService/(:num)', 'frontEnd\ServiceController::show/$1');

