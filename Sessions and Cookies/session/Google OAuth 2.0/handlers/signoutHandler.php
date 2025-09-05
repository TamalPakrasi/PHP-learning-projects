<?php

require_once __DIR__ . "/message.php";

session_start();
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_SESSION["username"]) && isset($_SESSION["email"])) {
  session_unset();
  session_destroy();

  session_start();
  session_regenerate_id(true);
  set_message("Signed out successfully");
  header("Location: ../pages/signin.php");
  exit;
}

header("Allow: GET");
http_response_code(405);
die("METHOD NOT EXIST");
