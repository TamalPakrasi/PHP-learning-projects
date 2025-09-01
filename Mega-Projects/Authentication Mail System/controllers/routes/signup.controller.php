<?php

if ($_SERVER["REQUEST_METHOD"] === "GET" && !isset($_SESSION["email"]) && !isset($_SESSION["username"])) {
  $active_page = "sign up";
  $view_file = __DIR__ . "/../../views/pages/signup.view.php";

  include_once __DIR__ . "/../../views/partials/boiler.php";
  die();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = (string) trim($_POST["new_user"]);
  $email = (string) trim($_POST["new_email"]);
  $password = (string) trim($_POST["new_password"]);

  if (!signUpFormatValidation($username, $email, $password)) {
    abort(404);
  }

  $otp = (int) trim($_POST["otp"]);

  if (signUpService($username, $email, $password, $otp)) {
    session_regenerate_id();
    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;
    header("Location: /");
    die();
  } else {
    abort(500);
  }
}


header("Allow: GET, POST");
abort(405);
