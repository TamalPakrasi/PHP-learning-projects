<?php

function set_message(string $msg): void
{
  $_SESSION["message"] = $msg;
}

function get_message(): string
{
  if (isset($_SESSION["message"])) {
    $msg = (string) $_SESSION["message"];
    unset($_SESSION["message"]);
    return "<div class='message'>" . $msg . "</div>";
  } else {
    return "";
  }
}
