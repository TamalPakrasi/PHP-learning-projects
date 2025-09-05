<?php

require_once __DIR__ . "/../handlers/message.php";

function abortSignUp(string $msg = "Something wrong"): void
{
  set_message($msg);
  header("Location: http://localhost/PHP-Mini%20Projects/Sessions%20and%20Cookies/session/Google%20OAuth%202.0/pages/signup.php");
  exit;
}

function abortSignIn(string $msg = "Something wrong"): void
{
  set_message($msg);
  header("Location: http://localhost/PHP-Mini%20Projects/Sessions%20and%20Cookies/session/Google%20OAuth%202.0/pages/signin.php");
  exit;
}
