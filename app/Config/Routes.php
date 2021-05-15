<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index'); //routes default
// note: closure=tanpa memanggil  method
// $routes->get('/coba', function () {
// 	echo "Ini disebut closure,cukup akses root/coba tanpa pakai method";
// });
// $routes->get('/tulisanasal', 'Coba::about2'); //http://localhost:8080/tulisanasal akses controler about dengan mensetting sembarang tulisan setelah root. disebut http spofing

// memanipulasi routes. sy ingin mengambil controller coba, methode about, param $nama...tetapi nulisnya dibuat lbih singkat mjd root/coba/nama (tanpa melewati about)
// $routes->get('/coba/(:any)/(:num)', 'Coba::about/$1/$2'); //http://localhost:8080/coba/Uwais . any=tulisan apapun. segment=apapun kecuali slash. num=angka. alpha=alphabet.alphanum=hanya angka dan huruf karakter gak masuk. 

// $routes->get('/users', 'Admin\Users::index');
$routes->delete('/admin/(:num)', 'Admin::delete/$1'); //:num krn id yg diposkan berupa angka
$routes->get('/admin/(:num)', 'Admin::detail/$1'); //jika ada yg akses admin/apapun
$routes->get('/admin/edit/(:segment)', 'Admin::edit/$1'); //jika ada yg akses admin/apapun
$routes->get('/produk/(:any)', 'Produk::detail/$1'); //kontroler Produk, method detail


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
