<?php

$routes = [
  "/" => __DIR__ . "/../controllers/routes/dashboard.controller.php",
  "/login" => __DIR__ . "/../controllers/routes/login.controller.php",
  "/signup" => __DIR__ . "/../controllers/routes/signup.controller.php",
  "/logout" => __DIR__ . "/../controllers/routes/logout.controller.php",
  "/api/signup" => __DIR__ . "/../controllers/API/signupAPI.controller.php"
];

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

if (array_key_exists($path, $routes)) {
  http_response_code(200);
  require_once $routes[$path];
  die();
} else {
  abort(404);
}