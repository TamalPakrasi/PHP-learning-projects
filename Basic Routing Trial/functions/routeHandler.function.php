<?php

function routeHandler(string $path, array $routes)
{
  if (array_key_exists($path, $routes)) {
    http_response_code(200);
    require $routes[$path];
  } else {
    abort(404);
  }
}
