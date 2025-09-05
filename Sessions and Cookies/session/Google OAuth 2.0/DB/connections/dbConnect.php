<?php

$servername = "localhost";
$dbUser = "root";
$dbPass = "";
$db = "taitonaki";

$conn = new mysqli($servername, $dbUser, $dbPass, $db);

if ($conn->connect_error) {
  die("Connection error");
}
