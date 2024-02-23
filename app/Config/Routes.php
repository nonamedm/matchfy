<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::list');
$routes->get('/index', 'Home::index');
$routes->get('/mo', 'MoHome::index');
$routes->get('/mo/pass', 'MoHome::pass');
$routes->get('/mo/agree', 'MoHome::agree');
$routes->get('/mo/signin', 'MoHome::signin');
$routes->get('/mo/signinType', 'MoHome::signinType');
$routes->get('/mo/signinSuccess', 'MoHome::signinSuccess');
$routes->get('/mo/signinRegular', 'MoHome::signinRegular');
$routes->get('/mo/signinPremium', 'MoHome::signinPremium');
$routes->get('/mo/signinPopup', 'MoHome::signinPopup');
$routes->get('/mo/menu', 'MoHome::menu');
$routes->get('/mo/notice', 'MoHome::notice');

