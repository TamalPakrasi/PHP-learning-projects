<?php

require_once __DIR__ . "/message.php";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_SESSION["username"]) && isset($_SESSION["email"])) {
  session_start();
  session_unset();
  set_message("Signed out successfully");
  header("Location: ../pages/signin.php");
  exit;
}

header("Allow: GET");
exit;
