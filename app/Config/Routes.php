<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/home_customer', 'HomeCUSTOMER::index');
$routes->post('/reserve/(:segment)', 'HomeCUSTOMER::reserve/$1');
$routes->get('/login', 'LoginController::index');
$routes->get('/', 'LoginController::index');
$routes->get('/logout', 'LoginController::logout');
$routes->post('/login_action', 'LoginController::login_action');

$routes->get('/home_customer/(:segment)', 'HomeCUSTOMER::detail/$1');
$routes->get('/reservations', 'CustomerReservation::index');

//admin
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/add', 'Hotel::add');
$routes->post('/add', 'Hotel::save');

//register
$routes->get('/register', 'RegisterController::index');
$routes->post('/register_action', 'RegisterController::register_action');