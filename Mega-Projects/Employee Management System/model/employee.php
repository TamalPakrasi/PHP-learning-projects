<?php

require_once __DIR__ . "/../utils/functions/abort.php";

function addEmployeeToDB(...$empDetails): bool
{
  $conn = connectToDB();

  if (!$conn) {
    return false;
  }

  list($empName, $jobId, $gender, $email, $joinedAt) = $empDetails;

  $stmt = $conn->prepare("INSERT INTO `employees`(`employee_name`, `job_id`, `gender`, `email`, `joined_at`) VALUES (?, ?, ?, ?, ?)");

  if (!$stmt) {

    return false;
  }

  $stmt->bind_param("sisss", $empName, $jobId, $gender, $email, $joinedAt);

  $res = $stmt->execute();
  $stmt->close();


  return $res;
}

function checkEmailInUse(string $email)
{
  $conn = connectToDB();

  if (!$conn) {
    abort(500);
  }

  $stmt = $conn->prepare("SELECT `email` FROM `employees` WHERE `email` = ?");

  if (!$stmt) {

    abort(500);
  }

  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  $exists = $stmt->num_rows() > 0;

  $stmt->close();


  if ($exists) {
    abort(404);
  }
}

function getEmployeeDetails(): array
{
  $conn = connectToDB();

  if (!$conn) {
    abort(500);
  }

  $sql = "SELECT e.emp_id, e.employee_name, j.job_role, e.joined_at FROM `employees` e 
  JOIN `job_role` j ON e.job_id = j.job_id ORDER BY e.joined_at DESC";

  $res = $conn->query($sql);

  if ($res === false) {

    abort(500);
  }

  if ($res->num_rows === 0) {

    return [];
  }

  $arr = $res->fetch_all(MYSQLI_ASSOC);

  return $arr;
}

function getEmployees(): array
{
  $conn = connectToDB();

  if (!$conn) {
    abort(500);
  }

  $sql = "SELECT e.employee_name, j.job_role FROM `employees` e 
  JOIN `job_role` j ON e.job_id = j.job_id";

  $res = $conn->query($sql);

  if ($res === false) {

    abort(500);
  }

  if ($res->num_rows === 0) {

    return [];
  }

  $arr = $res->fetch_all(MYSQLI_ASSOC);

  return $arr;
}

function checkEmployeeExistance(string $employee)
{
  $conn = connectToDB();

  if (!$conn) {
    abort(500);
  }

  $stmt = $conn->prepare("SELECT `employee_name` FROM `employees` WHERE `employee_name` = ?");

  if (!$stmt) {

    abort(500);
  }

  $stmt->bind_param("s", $employee);
  $stmt->execute();
  $stmt->store_result();

  $exists = $stmt->num_rows() > 0;

  $stmt->close();


  if (!$exists) {
    abort(404);
  }
}

function getEmployeeId(string $employee): string
{
  $conn = connectToDB();

  if (!$conn) {
    abort(500);
  }

  $stmt = $conn->prepare("SELECT `emp_id` FROM `employees` WHERE `employee_name` = ?");

  if (!$stmt) {

    abort(500);
  }

  $stmt->bind_param("s", $employee);
  $stmt->execute();
  $stmt->bind_result($empId);

  $hasId = $stmt->fetch();

  $stmt->close();


  if (!$hasId) {
    abort(500);
  }

  return (string) $empId;
}
