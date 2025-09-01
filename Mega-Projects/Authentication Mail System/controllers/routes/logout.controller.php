<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  if (logoutService()) {
    session_destroy();
    header("Location: /");
    die();
  } 

  die();
}

header("Allow: GET");
die();