<?php

if ($_SERVER["REQUEST_METHOD"] !== "GET") {
  header("Allow: GET");
  abort(405);
}

unset($_SESSION["otp"]);

$active_page = "log in";
$view_file = __DIR__ . "/../../views/pages/login.view.php";

include_once __DIR__ . "/../../views/partials/boiler.php";