<?php

if ($_SERVER["REQUEST_METHOD"] !== "GET") {
  header("Allow: GET");
  abort(405);
}

$active_page = "sign up";
$view_file = __DIR__ . "/../../views/pages/signup.view.php";

include_once __DIR__ . "/../../views/partials/boiler.php";