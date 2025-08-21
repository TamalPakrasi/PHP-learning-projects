<?php

require_once __DIR__ . "/routeMap.php";
require_once __DIR__ . "/../utils/functions/abort.php";

$path = trim($_SERVER["REQUEST_URI"], "/");

if (array_key_exists($path, $routes)) {
  http_response_code(200);
  require_once $routes[$path];
  die();
} else {
  abort(404);
}
