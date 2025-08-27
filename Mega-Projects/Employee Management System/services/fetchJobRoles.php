<?php

include_once __DIR__ . "/../model/connections/connect.php";
include_once __DIR__ . "/../utils/functions/abort.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  $sql = "SELECT `job_role` FROM `job_role`";

  $job_roles = $conn->query($sql);

  if ($job_roles->num_rows === 0) {
    abort("No Job Role Found");
  }
} else {
  abort(400);
}