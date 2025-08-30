<?php

require_once __DIR__ . "/../../utils/functions/abort.php";

function getConnection(): mysqli
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "taitonaki_auth_mail_system";

  $conn = new mysqli($servername, $username, $password, $database);

  if ($conn->connect_error) {
    abort(500);
  }

  return $conn;
}

function getDB(): mysqli
{
  static $conn;
  if (!$conn) {
    $conn = getConnection();
  }
  return $conn;
}

register_shutdown_function(function () {
  $conn = getDB();
  if ($conn) {
    $conn->close();
  }
});
