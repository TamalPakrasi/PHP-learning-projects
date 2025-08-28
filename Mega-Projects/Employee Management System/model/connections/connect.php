<?php

require_once __DIR__ . "/../../utils/functions/debug.php";
require_once __DIR__ . "/../../utils/functions/abort.php";

function connectToDB(): mysqli
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
