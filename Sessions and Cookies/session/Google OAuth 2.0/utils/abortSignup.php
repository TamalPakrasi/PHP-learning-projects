<?php

require_once __DIR__ . "/../handlers/message.php";

function abortSignUp(string $msg = "Something wrong"): void
{
  set_message($msg);
  header("Location: ../pages/signup.php");
  exit;
}
