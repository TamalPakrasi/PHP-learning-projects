<?php

require_once __DIR__ . "/../model/employee.php";
require_once __DIR__ . "/../model/jobRoles.php";

function addEmployeeService(...$empDetails)
{
  list($empName, $jobRole, $gender, $email, $joinedAt) = $empDetails;

  if (!$empName || !$email || !$gender || !$jobRole) {
    abort(404);
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    abort(404);
  }

  checkEmailInUse($email);

  $jobId = (string) checkJobRoleValidity($jobRole);

  return addEmployeeToDB($empName, $jobId, $gender, $email, $joinedAt);
}
