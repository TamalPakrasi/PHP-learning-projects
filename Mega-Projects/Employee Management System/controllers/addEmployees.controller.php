<?php

require_once __DIR__ . "/../utils/functions/abort.php";
require_once __DIR__ . "/../services/employeeServices.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $empName = (string) trim($_POST["emp_name"]);
  $email = (string) trim($_POST["email"]);
  $gender = (string) $_POST["gender"];
  $jobRole = (string) $_POST["job_role"];
  $joinedAt = empty($_POST["join_date"]) ? date("Y-m-d") : $_POST["join_date"];

  if (addEmployeeService($empName, $jobRole, $gender, $email, $joinedAt)) {
    header("Location: /employees");
    die();
  } else {
    abort(500);
  }
} else {
  abort(400);
}
