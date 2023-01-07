<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
 
//http://localhost:8080/api/
$routes->group('api', ['namespace' => 'App\Controllers\API'], function($routes){

    //http://localhost:8080/api/ejercicios -->GET
    $routes->get('ejercicios', 'Ejercicios::index');

    //http://localhost:8080/api/ejercicios/create -->POST
    $routes->post('ejercicios/create', 'Ejercicios::create');

    //http://localhost:8080/api/ejercicios/buscar
    $routes->get('ejercicios/buscar/(:num)', 'Ejercicios::buscar/$1');

    //http://localhost:8080/api/ejercicios/update
    $routes->put('ejercicios/update/(:num)', 'Ejercicios::update/$1');

    //http://localhost:8080/api/ejercicios/delete
    $routes->delete('ejercicios/delete/(:num)', 'Ejercicios::delete/$1');

 //////////////////////////////////////////////////////////////////////////////////////
  
    //http://localhost:8080/api/planAlimentacion -->GET
    $routes->get('planAlimentacion', 'PlanAlimentacion::index');

    //http://localhost:8080/api/planAlimentacion/create -->POST
    $routes->post('planAlimentacion/create', 'PlanAlimentacion::create');

    //http://localhost:8080/api/planAlimentacion/buscar
    $routes->get('planAlimentacion/buscar/(:num)', 'PlanAlimentacion::buscar/$1');

    //http://localhost:8080/api/planAlimentacion/update
    $routes->put('planAlimentacion/update/(:num)', 'PlanAlimentacion::update/$1');

    //http://localhost:8080/api/planAlimentacion/delete
    $routes->delete('planAlimentacion/delete/(:num)', 'PlanAlimentacion::delete/$1');

    /////////////////////////////////////////////////////////////////////////////////////


    //http://localhost:8080/api/planEntrenamiento -->GET
    $routes->get('planEntrenamiento', 'PlanEntrenamiento::index');

    //http://localhost:8080/api/planEntrenamiento/create -->POST
    $routes->post('planEntrenamiento/create', 'PlanEntrenamiento::create');

    //http://localhost:8080/api/planEntrenamiento/buscar
    $routes->get('planEntrenamiento/buscar/(:num)', 'PlanEntrenamiento::buscar/$1');

    //http://localhost:8080/api/planAlimentacion/update
    $routes->put('planEntrenamiento/update/(:num)', 'PlanEntrenamiento::update/$1');

    //http://localhost:8080/api/planAlimentacion/delete
    $routes->delete('planEntrenamiento/delete/(:num)', 'PlanEntrenamiento::delete/$1');

    //////////////////////////////////////////////////////////////////////////////////////////


    //http://localhost:8080/api/usuarios -->GET
    $routes->get('usuarios', 'Usuarios::index');

    //http://localhost:8080/api/usuarios/create -->POST
    $routes->post('usuarios/create', 'Usuarios::create');

    //http://localhost:8080/api/usuarios/buscar
    $routes->get('usuarios/buscar/(:num)', 'Usuarios::buscar/$1');

    //http://localhost:8080/api/usuarios/update
    $routes->put('usuarios/update/(:num)', 'Usuarios::update/$1');

    //http://localhost:8080/api/usuarios/delete
    $routes->delete('usuarios/delete/(:num)', 'Usuarios::delete/$1');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
