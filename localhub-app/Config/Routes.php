<?php

use CodeIgniter\Router\RouteCollection;

// if($_SERVER['HTTP_HOST'] == APP_BASE_URL)
// {
//     header('Location: https://whofi.com');
//     exit();
// }
// if(filter_var($_SERVER['HTTP_HOST'], FILTER_VALIDATE_IP))
// {
//     header('Location: https://whofi.com');
//     exit();
// }

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


