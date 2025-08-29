<?php

require_once __DIR__ . "/../model/employee.php";
require_once __DIR__ . "/../model/jobRoles.php";
require_once __DIR__ . "/../utils/functions/abort.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  $empDetails = getEmployeeDetails();
  $job_roles = getJobRoles();
  $title = "Task - Employees";
  $active_page = "employees";

  include_once __DIR__ . "/../views/employees.view.php";
} else {
  abort(400);
}
