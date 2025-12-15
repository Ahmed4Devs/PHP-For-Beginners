<?php

use Core\Session;

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
  // Core\Database
  $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

  require basePath("{$class}.php");
});

require basePath('bootstrap.php');

$router = new \Core\Router();
$routes = require basePath('routes.php');

// parse_url function take the request path to use it down
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

Session::unflash();
