<?php

function set_message(string $msg): void
{
  $_SESSION["message"] = $msg;
}

function get_message(): string
{
  session_start();
  $msg = (string) $_SESSION["message"];
  unset($_SESSION["message"]);
  return $msg;
}
