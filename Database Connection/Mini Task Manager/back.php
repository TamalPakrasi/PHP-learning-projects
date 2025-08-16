<?php

require_once __DIR__ . "/connect.php";
require_once __DIR__ . "/function.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $newUser = $_POST["adduser"];

  $sql = "INSERT INTO `taskuser`(`username`) VALUES ('$newUser')";

  $resUsers = mysqli_query($conn, $sql);

  if ($resUsers) {
    redirection("New User added successfully");
  } else {
    abort("Failed to add new user", 500);
  }
}