<?php

require_once __DIR__ . "/../handlers/message.php";

function signInUser(string $username, string $email): void
{
  session_regenerate_id(true);
  $_SESSION["username"] = $username;
  $_SESSION["email"] = $email;
  set_message("Signed in successfully");
  header("Location: ../pages/content.php");
  exit;
}
