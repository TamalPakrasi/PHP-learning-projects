<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  unset($_SESSION["otp"]);
  $active_page = "log in";
  $view_file = __DIR__ . "/../../views/pages/login.view.php";

  include_once __DIR__ . "/../../views/partials/boiler.php";
  exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = trim($_POST["email"]);
  $password = isset($_POST["password"]) ? trim($_POST["password"]) : null;
  $otp = isset($_POST["otp"]) ? trim($_POST["otp"]) : null;

  $username = logInService($email, $password, $otp);
  if (!empty($username)) {
    session_regenerate_id();
    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;
    header("Location: /");
    die();
  } else {
    abort(500);
  }
  exit;
}

header("Allow: GET, POST");
die();
