<?php

$routes = [
  "" => __DIR__ . "/../controllers/routes/dashboard.controller.php",
  "login" => __DIR__ . "/../controllers/routes/login.controller.php",
  "signup" => __DIR__ . "/../controllers/routes/signup.controller.php",
];

$path = trim($_SERVER["REQUEST_URI"], "/");

if (array_key_exists($path, $routes)) {
  http_response_code(200);
  require_once $routes[$path];
  die();
} else {
  abort(404);
}