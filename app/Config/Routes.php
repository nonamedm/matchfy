<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/mo', 'MoHome::index');
$routes->get('/mo/pass', 'MoHome::pass');
$routes->get('/mo/agree', 'MoHome::agree');
