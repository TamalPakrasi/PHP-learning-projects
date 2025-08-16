<?php

declare(strict_types=1);
require_once __DIR__ . "/function.php";

$servername = "localhost";
$username = "root";
$password = "";
$database = "taitonaki";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  abort("Failed to connect with database", 500);
}