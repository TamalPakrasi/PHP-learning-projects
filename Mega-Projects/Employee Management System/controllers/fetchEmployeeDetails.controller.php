<?php

require_once __DIR__ . "/../model/employee.php";
require_once __DIR__ . "/../utils/functions/abort.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  $empDetails = getEmployeeDetails();
} else {
  abort(400);
}