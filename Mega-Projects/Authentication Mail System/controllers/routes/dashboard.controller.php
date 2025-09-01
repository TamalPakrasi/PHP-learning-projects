<?php

if ($_SERVER["REQUEST_METHOD"] !== "GET") {
  header("Allow: GET");
  abort(405);
}

unset($_SESSION["otp"]);

routeProtector();

if (!changeLoginStatusService()) {
  abort(500);
}

$active_page = "dashboard";
$view_file = __DIR__ . "/../../views/pages/dashboard.view.php";

include_once __DIR__ . "/../../views/partials/boiler.php";