<?php

declare(strict_types=1);
define("BASE_PATH", __DIR__ . "/../");

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

spl_autoload_register(function (string $class) {
  $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
  $class = str_replace("App", "src", $class);

  require BASE_PATH . $class . ".php";
});
