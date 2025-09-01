<?php

unset($_SESSION["otp"]);
if ($_SERVER["REQUEST_METHOD"] === "GET") {
  $active_page = "log in";
  $view_file = __DIR__ . "/../../views/pages/login.view.php";

  include_once __DIR__ . "/../../views/partials/boiler.php";
  exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  exit;
}

header("Allow: GET, POST");
die();