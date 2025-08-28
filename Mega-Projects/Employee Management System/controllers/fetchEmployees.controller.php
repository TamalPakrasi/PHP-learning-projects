<?php

require_once __DIR__ . "/../utils/functions/abort.php";
require_once __DIR__ . "/../model/employee.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  $employees = getEmployees();
} else {
  abort(400);
}