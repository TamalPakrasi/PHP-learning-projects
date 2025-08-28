<?php

require_once __DIR__ . "/connections/connect.php";
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
    $conn->close();
    return false;
  }

  $stmt->bind_param("sisss", $empName, $jobId, $gender, $email, $joinedAt);

  $res = $stmt->execute();
  $stmt->close();
  $conn->close();

  return $res;
}

function checkEmailInUse(string $email) {
  $conn = connectToDB();

  if (!$conn) {
    abort(500);
  }

  $stmt = $conn->prepare("SELECT `email` FROM `employees` WHERE `email` = ?");

  if (!$stmt) {
    $conn->close();
    abort(500);
  }

  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  $exists = $stmt->num_rows() > 0;

  $stmt->close();
  $conn->close();

  if ($exists) {
    abort(404);
  }
}

function getEmployeeDetails() {
  $conn = connectToDB();

  if (!$conn) {
    abort(500);
  }

  $sql = "SELECT e.emp_id, e.employee_name, j.job_role, e.joined_at FROM `employees` e 
  JOIN `job_role` j ON e.job_id = j.job_id ORDER BY e.created_at DESC";

  $res = $conn->query($sql);

  if ($res->num_rows === 0) {
    abort(500);
  }

  return $res->fetch_all(MYSQLI_ASSOC);
}