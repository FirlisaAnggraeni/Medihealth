<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// PRESSENTATION LAYER
$routes->get('login', 'Web::login');
$routes->get('logout', 'Web::logout');
$routes->get('register', 'Web::register');

$routes->get('/', 'Web::home', ['filter' => 'auth']);
$routes->get('cart', 'Web::cart', ['filter' => 'auth:guest']);
$routes->get('about', 'Web::about', ['filter' => 'auth:guest']);
$routes->get('profile', 'Web::profile', ['filter' => 'auth']);
$routes->get('transaction', 'Web::transaction', ['filter' => 'auth:guest']);

$routes->group("product", ['filter' => 'auth'], function ($routes) {
	$routes->get('create', 'Web::createProduct', ['filter' => 'auth:admin']);
	$routes->get('edit/(:num)', 'Web::editProduct/$1', ['filter' => 'auth:admin']);
	$routes->get('(:num)', 'Web::detailProduct/$1');
});


// PROCESS
$routes->group("api", function ($routes) {
	$routes->group("product", function ($routes) {
		$routes->post('create', 'Product::create');
		$routes->post('edit/(:num)', 'Product::edit/$1');
		$routes->get('destroy/(:num)', 'Product::destroy/$1');
	});
	
	$routes->group("review", function ($routes) {
		$routes->post('create/(:num)', 'Review::create/$1');
		$routes->get('destroy/(:num)', 'Review::destroy/$1');
	});
	
	$routes->group("cart", function ($routes) {
		$routes->get('add/(:num)', 'Cart::add/$1');
		$routes->post('edit/(:num)', 'Cart::edit/$1');
		$routes->get('destroy/(:num)', 'Cart::destroy/$1');
	});

	$routes->group("transaction", function ($routes) {
		$routes->get('buy', 'Transaction::buy');
	});
	
	$routes->group("review", function ($routes) {
		$routes->get('create/(:num)', 'Review::create/$id');
		$routes->get('destroy/(:num)', 'Review::destroy/$id');
	});

	$routes->group("user", function ($routes) {
		$routes->post('login', 'User::login');
		$routes->post('register', 'User::register');
		$routes->post('change-password', 'User::changePassword');
		$routes->post('edit', 'User::edit');
		$routes->get('destroy', 'User::destroy');
	});
});

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
