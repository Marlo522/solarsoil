<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public and Auth pages (restricted from admins and sellers)
$routes->group('', ['filter' => 'guest'], static function ($routes) {
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
});
$routes->get('logout', 'Auth::logout');

// Authenticated user pages
$routes->get('cart', 'PageController::cart', ['filter' => 'auth:consumer']);
$routes->get('checkout', 'PageController::checkout', ['filter' => 'auth:consumer']);
$routes->get('profile', 'PageController::profile', ['filter' => 'auth:consumer']);

// Farmer dashboard
$routes->group('farmer', ['filter' => 'auth:seller'], static function ($routes) {
    $routes->get('dashboard', 'PageController::farmerDashboard');
    $routes->get('products', 'PageController::farmerDashboard');
    $routes->get('orders', 'PageController::farmerDashboard');
    $routes->get('profile', 'PageController::farmerProfile');
    $routes->post('products/add', 'FarmerController::addProduct');
});

// Admin dashboard
$routes->group('admin', ['filter' => 'auth:admin'], static function ($routes) {
    $routes->get('dashboard', 'PageController::adminDashboard');
    $routes->get('farmers', 'AdminController::farmers');
    $routes->get('farmers/(:num)', 'AdminController::farmerDetail/$1');
    $routes->get('consumers', 'AdminController::consumers');
    $routes->get('consumers/(:num)', 'AdminController::consumerDetail/$1');
    $routes->get('orders', 'AdminController::orders');
    $routes->get('orders/(:num)', 'AdminController::order_detail/$1');
    $routes->get('products', 'PageController::adminDashboard');
    $routes->get('products', 'PageController::adminDashboard');
    $routes->get('profile', 'PageController::adminProfile');
});
