<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  $active_page = "sign up";
  $view_file = __DIR__ . "/../../views/pages/signup.view.php";

  include_once __DIR__ . "/../../views/partials/boiler.php";
  die();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  die();
}


header("Allow: GET, POST");
abort(405);
