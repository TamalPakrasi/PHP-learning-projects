<?php

require_once __DIR__ . "/connections/connect.php";
require_once __DIR__ . "/../utils/functions/abort.php";

function checkJobRoleValidity(string $jobRole): string
{
  $conn = connectToDB();

  if (!$conn) {
    abort(500);
  }

  $stmt = $conn->prepare("SELECT `job_id` FROM `job_role` WHERE `job_role` = ?");

  if (!$stmt) {
    $conn->close();
    abort(500);
  }

  $stmt->bind_param("s", $jobRole);
  $stmt->execute();

  $stmt->bind_result($jobId);

  $isValid = $stmt->fetch();

  $stmt->close();
  $conn->close();

  if (!$isValid) {
    abort(400);
  }

  return (string) $jobId;
}

function getJobRoles() {
  $conn = connectToDB();

  if (!$conn) {
    abort(500);
  }

  $sql = "SELECT `job_role` FROM `job_role`";

  $res = $conn->query($sql);

  if ($res === false) {
    $conn->close();
    abort(500);
  }

  if ($res->num_rows === 0) {
    $conn->close();
    return [];
  }

  $arr = $res->fetch_all(MYSQLI_ASSOC);
  $conn->close();

  return $arr;
}
