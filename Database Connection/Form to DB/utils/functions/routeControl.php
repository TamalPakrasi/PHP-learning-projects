<?php

require_once __DIR__ . "/abort.php";

function routeControl(string $path, array $routes) {
  if (array_key_exists($path, $routes)) {
    http_response_code(200);
    require_once $routes[$path];
  } else {
    abort();
  }
}