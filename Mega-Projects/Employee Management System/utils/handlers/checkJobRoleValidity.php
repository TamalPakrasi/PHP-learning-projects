<?php

require_once __DIR__ . "/../functions/abort.php";

function checkJobRoleValidity(mysqli $conn, string $jobRole): string {
  $sql = "SELECT `job_id` FROM `job_role` WHERE `job_role` = '$jobRole'";

  $res = $conn->query($sql);

  if ($res->num_rows === 0) {
    abort(400);
  }

  return (string) $res->fetch_row()[0];  
}