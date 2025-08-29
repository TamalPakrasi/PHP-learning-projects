<?php

require_once __DIR__ . "/../../utils/functions/debug.php";
require_once __DIR__ . "/../../utils/functions/abort.php";

function getConnection(): mysqli
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "taitonaki_emp_management";

  $conn = new mysqli($servername, $username, $password, $database);

  if ($conn->connect_error) {
    abort("Failed to connect database");
  }

  return $conn;
}

function connectToDB(): mysqli
{
  static $conn;
  if (!$conn) {
    $conn = getConnection();
  }
  return $conn;
}

function end_script_close_connection()
{
  $conn = connectToDB();
  if ($conn) {
    $conn->close();
  }
}

register_shutdown_function('end_script_close_connection');
