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
$routes->group('', ['filter' => 'auth:consumer'], static function ($routes) {
    $routes->get('cart', 'PageController::cart');
    $routes->post('cart/add', 'CartController::add');
    $routes->post('cart/update', 'CartController::update');
    $routes->post('cart/remove', 'CartController::remove');
    $routes->get('checkout', 'PageController::checkout');
    $routes->post('checkout/process', 'PageController::processCheckout');
    $routes->get('confirmation', 'PageController::confirmation');
    $routes->post('order/place', 'PageController::placeOrder');
    $routes->get('profile', 'PageController::profile');
});

// Farmer dashboard
$routes->group('farmer', ['filter' => 'auth:seller'], static function ($routes) {
    $routes->get('dashboard', 'FarmerController::index');
    $routes->get('products', 'FarmerController::products');
    $routes->get('products/(:num)', 'FarmerController::productDetail/$1');
    $routes->get('orders', 'FarmerController::orders');
    $routes->get('orders/(:num)', 'FarmerController::orderDetail/$1');
    $routes->get('profile', 'PageController::farmerProfile');
    $routes->post('products/add', 'FarmerController::addProduct');
    $routes->post('products/edit/(:num)', 'FarmerController::editProduct/$1');
    $routes->post('products/delete/(:num)', 'FarmerController::deleteProduct/$1');
});

// Admin dashboard
$routes->group('admin', ['filter' => 'auth:admin'], static function ($routes) {
    $routes->get('dashboard', 'AdminController::index');
    $routes->get('farmers', 'AdminController::farmers');
    $routes->get('farmers/(:num)', 'AdminController::farmerDetail/$1');
    $routes->get('farmers/deactivate/(:num)', 'AdminController::deactivateFarmer/$1');
    $routes->get('farmers/activate/(:num)', 'AdminController::activateFarmer/$1');
    $routes->get('consumers', 'AdminController::consumers');
    $routes->get('consumers/(:num)', 'AdminController::consumerDetail/$1');
    $routes->get('consumers/deactivate/(:num)', 'AdminController::deactivateConsumer/$1');
    $routes->get('consumers/activate/(:num)', 'AdminController::activateConsumer/$1');
    $routes->get('orders', 'AdminController::orders');
    $routes->get('orders/(:num)', 'AdminController::order_detail/$1');
    $routes->get('products', 'AdminController::products');
    $routes->get('products/(:num)', 'AdminController::productDetail/$1');
    $routes->get('profile', 'AdminController::profile');
    $routes->get('editprofile', 'AdminController::editProfile');
    $routes->post('updateprofile', 'AdminController::updateProfile');
    $routes->post('changepassword', 'AdminController::changePassword');
});
