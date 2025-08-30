<?php

function routeProtector() : void
{
  if (empty($_SESSION['email']) || empty($_SESSION['username'])) {
    header("Location: /login");
    exit;
  }
}
