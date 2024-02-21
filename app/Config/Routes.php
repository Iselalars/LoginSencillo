<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('/registro', 'Login::mostrar');
$routes->post('/validar', 'Login::validar');
$routes->get('/inicio', 'Login::mostrarInicio');
$routes->post('/registrar', 'Login::registrar');
$routes->get('/cerrarSesion', 'Login::cerrarSesion');



