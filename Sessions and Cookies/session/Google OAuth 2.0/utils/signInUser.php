<?php

require_once __DIR__ . "/../handlers/message.php";

function signInUser(string $username, string $email): void
{
  session_status() !== PHP_SESSION_ACTIVE ? session_start() : session_regenerate_id();
  $_SESSION["username"] = $username;
  $_SESSION["email"] = $email;
  set_message("Signed in successfully");
  header("Location: ../pages/content.php");
  exit;
}
