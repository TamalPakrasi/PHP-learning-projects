<?php

require_once __DIR__ . "/../model/connections/connect.php";
require_once __DIR__ . "/../utils/functions/abort.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  $sql = "SELECT e.emp_id, e.employee_name, j.job_role, e.joined_at FROM `employees` e 
  JOIN `job_role` j ON e.job_id = j.job_id";

  $empDetails = $conn->query($sql);

  if ($empDetails->num_rows === 0) {
    abort(500);
  }
} else {
  abort(400);
}