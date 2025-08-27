<?php

require_once __DIR__ . "/../model/connections/connect.php";
require_once __DIR__ . "/../utils/functions/abort.php";
require_once __DIR__ . "/../utils/handlers/checkJobRoleValidity.php";
require_once __DIR__ . "/../utils/handlers/checkEmailInUse.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $empName = $_POST["emp_name"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];
  $jobRole = $_POST["job_role"];
  $joinedAt = empty($_POST["join_date"]) ? date("Y-m-d") : $_POST["join_date"];

  if (!$empName || !$email || !$gender || !$jobRole) {
    abort(404);
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    abort(404);
  }

  checkEmailInUse($conn, $email);

  $jobId = (string) checkJobRoleValidity($conn, $jobRole);

  $sql = "INSERT INTO `employees`(`employee_name`, `job_id`, `gender`, `email`, `joined_at`) VALUES ('$empName','$jobId','$gender','$email','$joinedAt')";

  $res = $conn->query($sql);

  if ($res === true) {
    header("Location: /employees");
    die();
  } else {
    abort(500);
  }
} else {
  abort(400);
}
