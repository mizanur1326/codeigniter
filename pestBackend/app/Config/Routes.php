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




//Blogs Routes
$routes->get('blogs', 'BlogController::index' , ['filter' => 'authGuard']);
$routes->get('blogs/create', 'BlogController::create' , ['filter' => 'authGuard']);
$routes->post('blogs/store', 'BlogController::store', ['filter' => 'authGuard']);
$routes->get('blogs/delete/(:num)', 'BlogController::delete/$1');
$routes->get('blogs/edit/(:num)', 'BlogController::edit/$1');
$routes->post('blogs/update/(:num)', 'BlogController::update/$1');




//Signup /Signin
$routes->get('signup', 'SignupController::index');
$routes->match(['get', 'post'], 'signup/store', 'SignupController::store');

$routes->get('signin', 'SigninController::index');
$routes->post('login', 'SigninController::login');
$routes->get('signout', 'SigninController::logout');



//FrontEnd Routes Start

//FrontEnd Servie Routes
$routes->get('allService', 'frontEnd\ServiceController::index');
$routes->get('allService/(:num)', 'frontEnd\ServiceController::show/$1');

//FrontEnd Blog Routes
$routes->get('allBlog', 'frontEnd\BlogController::index');
$routes->get('allBlog/(:num)', 'frontEnd\BlogController::show/$1');

