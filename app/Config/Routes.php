<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'InterfaceController::index');
$routes->get('login', 'InterfaceController::login');
$routes->get('home', 'InterfaceController::dashboard', ['filter' => 'adminauth']);
$routes->get('settings', 'InterfaceController::settings', ['filter' => 'adminauth']);
$routes->get('users', 'InterfaceController::users', ['filter' => 'adminauth']);
$routes->get('logs', 'InterfaceController::logs', ['filter' => 'adminauth']);

$routes->post('/login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');


$routes->group('medical', ['filter' => 'adminauth'], function($routes) {
    $routes->get('records', 'InterfaceController::medicalRecords');
    $routes->get('records/(:num)/prescriptions', 'InterfaceController::medicalPrescriptions/$1');
});

$routes->group('patients', ['filter' => 'adminauth'], function($routes) {
    $routes->get('registered', 'InterfaceController::registeredPatients');
});



$routes->group('api', ['filter' => 'adminauth'], function($routes) {

    $routes->group('medical', function($routes) {
        $routes->get('record', 'MedicalRecord::index');
        $routes->post('record', 'MedicalRecord::insert');
        $routes->get('record/(:num)', 'MedicalRecord::show/$1');
        $routes->put('record/(:num)', 'MedicalRecord::update/$1');
        $routes->delete('record/(:num)', 'MedicalRecord::delete/$1');

        $routes->get('record/(:num)/prescriptions', 'MedicalPrescription::index/$1');
        $routes->post('prescription', 'MedicalPrescription::insert');
        $routes->get('prescription/(:num)', 'MedicalPrescription::show/$1');
        $routes->put('prescription/(:num)', 'MedicalPrescription::update/$1');
        $routes->delete('prescription/(:num)', 'MedicalPrescription::delete/$1');
    });


    $routes->group('patients', function($routes) {
        $routes->get('registered', 'Patient::index');
        $routes->get('registered/consulting', 'Patient::consulting');
        $routes->post('registered', 'Patient::insert');
        $routes->get('registered/(:num)', 'Patient::show/$1');
        $routes->put('registered/(:num)', 'Patient::update/$1');
        $routes->delete('registered/(:num)', 'Patient::delete/$1');
    });

    $routes->group('users', function($routes) {
        $routes->get('registered', 'Admin::all');
        $routes->post('registered', 'Admin::insert');
        $routes->get('registered/(:num)', 'Admin::show/$1');
        $routes->put('registered/(:num)', 'Admin::update/$1');
        $routes->delete('registered/(:num)', 'Admin::delete/$1');
    });

});


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
