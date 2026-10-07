<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/welcome', 'Home::index');
$routes->get('/tasks', 'Home::tasks');
$routes->get('/profile', 'Home::profile');
$routes->get('/about', 'Home::about');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');
$routes->post('/logout', 'Auth::logout');

$routes->get('/tasks/new', 'TaskController::newTask', ['filter' => 'auth']);
$routes->post('/tasks/create', 'TaskController::create', ['filter' => 'auth']);
$routes->get('/tasks/edit/(:num)', 'TaskController::edit/$1', ['filter' => 'auth']);
$routes->post('/tasks/update/(:num)', 'TaskController::update/$1', ['filter' => 'auth']);
$routes->post('/tasks/archive/(:num)', 'TaskController::archive/$1', ['filter' => 'auth']);