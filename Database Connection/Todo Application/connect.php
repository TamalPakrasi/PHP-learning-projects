<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "taitonaki";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  echo "Failed to connect" . "<br>";
  die();
}
