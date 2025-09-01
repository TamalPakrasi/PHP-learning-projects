<?php

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_SESSION["email"]) && isset($_SESSION["username"])) {
  if (logoutService()) {
    session_destroy();
    header("Location: /");
    die();
  }

  die();
}

header("Allow: GET");
abort(405);
