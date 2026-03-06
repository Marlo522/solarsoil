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
$routes->post('login', 'AuthController::attemptLogin');
$routes->post('register', 'AuthController::attemptRegister');
$routes->get('logout', 'AuthController::logout');

// Authenticated user pages
$routes->get('cart', 'PageController::cart');
$routes->get('checkout', 'PageController::checkout');
$routes->get('profile', 'PageController::profile');

// Farmer dashboard
$routes->group('farmer', static function ($routes) {
    $routes->get('dashboard', 'PageController::farmerDashboard');
    $routes->get('products', 'PageController::farmerDashboard');
    $routes->get('orders', 'PageController::farmerDashboard');
    $routes->post('products/add', 'FarmerController::addProduct');
});

// Admin dashboard
$routes->group('admin', static function ($routes) {
    $routes->get('dashboard', 'PageController::adminDashboard');
    $routes->get('farmers', 'PageController::adminDashboard');
    $routes->get('consumers', 'PageController::adminDashboard');
    $routes->get('orders', 'PageController::adminDashboard');
    $routes->get('products', 'PageController::adminDashboard');
});
