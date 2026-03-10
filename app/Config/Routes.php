<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public pages
$routes->get('/', 'PageController::home');
$routes->get('products', 'PageController::products');
$routes->get('products/(:num)', 'PageController::productDetail/$1');
$routes->get('about', 'PageController::about');

// Auth
$routes->get('login', 'PageController::login');
$routes->get('register', 'PageController::register');
$routes->post('login', 'Auth::login');
$routes->post('register', 'Auth::register');
$routes->get('logout', 'Auth::logout');

// Authenticated user pages
$routes->get('cart', 'PageController::cart');
$routes->get('checkout', 'PageController::checkout');
$routes->get('profile', 'PageController::profile');

// Farmer dashboard
$routes->group('farmer', static function ($routes) {
    $routes->get('dashboard', 'PageController::farmerDashboard');
    $routes->get('products', 'PageController::farmerDashboard');
    $routes->get('orders', 'PageController::farmerDashboard');
    $routes->get('profile', 'PageController::farmerProfile');
    $routes->post('products/add', 'FarmerController::addProduct');
});

// Admin dashboard
$routes->group('admin', static function ($routes) {
    $routes->get('dashboard', 'PageController::adminDashboard');
    $routes->get('farmers', 'AdminController::farmers');
    $routes->get('farmers/(:num)', 'AdminController::farmerDetail/$1');
    $routes->get('consumers', 'AdminController::consumers');
    $routes->get('consumers/(:num)', 'AdminController::consumerDetail/$1');
    $routes->get('orders', 'PageController::adminOrders');
    $routes->get('products', 'PageController::adminProducts');
    $routes->get('profile', 'PageController::adminProfile');
});
