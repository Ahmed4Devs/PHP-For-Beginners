<?php

use Core\Session;
use Core\ValidationException;


const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'vendor/autoload.php';

session_start();

require BASE_PATH . 'Core/functions.php';

require basePath('bootstrap.php');

$router = new \Core\Router();
$routes = require basePath('routes.php');

// parse_url function take the request path to use it down
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


try {
  $router->route($uri, $method);
} catch (ValidationException $exception) {
  Session::flash('errors', $exception->errors);
  Session::flash('old', $exception->old);

  return redirect($router->prevUrl());
}

Session::unflash();
