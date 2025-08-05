<?php

require_once __DIR__ . "/router.php";
require_once __DIR__ . "/../utils/functions/routeControl.php";
require_once __DIR__ . "/../utils/functions/staticServe.php";

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$file = dirname(__DIR__) . "/public" . $path;

if ($path === "/uploadFile") {
  include __DIR__ . "/../uploads/upload.php";
  die();
} 

staticServer($file);

routeControl($path, $routes);