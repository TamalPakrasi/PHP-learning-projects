<?php

$query = $_GET["msg"] ?? "";

$path = trim($query, "/");

$routes = [
  "home" => "controllers/intro.controller.php",
  "about" => "controllers/about.controller.php",
  "contact" => "controllers/contact.controller.php"
];

routeHandler($path, $routes);