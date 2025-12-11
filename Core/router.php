<?php

function routeToController($uri, $routes)
{
  // if the uri request is not in our routes then call abort function.
  if (array_key_exists($uri, $routes)) {
    require basePath($routes[$uri]);
  } else {
    abort();
  }
}

function abort($code = 404)
{
  http_response_code($code);

  require BasePath("views/{$code}.php");

  die();
}

$routes = require basePath('routes.php');
// parse_url function take the request path to use it down
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);
