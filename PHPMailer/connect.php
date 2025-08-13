<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "taitonaki";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  echo "Unable to connect database";
  die();
}