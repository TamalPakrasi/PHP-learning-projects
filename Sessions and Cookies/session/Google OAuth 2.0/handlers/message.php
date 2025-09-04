<?php

function set_message(string $msg): void
{
  session_status() !== PHP_SESSION_ACTIVE ? session_start() : session_regenerate_id();
  $_SESSION["message"] = $msg;
}

function get_message(): string
{
  session_start();
  $msg = (string) $_SESSION["message"];
  unset($_SESSION["message"]);
  return $msg;
}
