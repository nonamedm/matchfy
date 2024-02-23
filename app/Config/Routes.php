<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/mo', 'MoHome::index');
$routes->get('/mo/pass', 'MoHome::pass');
$routes->get('/mo/agree', 'MoHome::agree');
$routes->get('/mo/signin', 'MoHome::signin');
$routes->get('/mo/signinType', 'MoHome::signinType');
$routes->get('/mo/signinSuccess', 'MoHome::signinSuccess');
$routes->get('/mo/signinRegular', 'MoHome::signinRegular');
