<?php

function isActive(string $page = ""): string
{
  $basename = "/PHP-Mini%20Projects/Sessions%20and%20Cookies/session/Google%20OAuth%202.0";
  $currPath = substr(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), strlen($basename));
  return $page === $currPath ? "active" : "";
}
