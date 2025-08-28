<?php

require_once __DIR__ . "/connections/connect.php";
require_once __DIR__ . "/../utils/functions/abort.php";

function addTaskToDB(...$taskDetails): bool
{
  $conn = connectToDB();

  if (!$conn) {
    abort(500);
  }

  list($empId, $priority, $deadline, $task_title, $task_desc) = $taskDetails;

  $stmt = $conn->prepare("INSERT INTO `tasks`(`emp_id`, `task_title`, `task_desc`, `priority`, `deadline`) VALUES (?, ?, ?, ?, ?)");

  if (!$stmt) {
    $conn->close();
    abort(500);
  }

  $stmt->bind_param("issss", $empId, $task_title, $task_desc, $priority, $deadline);
  $res = $stmt->execute();

  $stmt->close();
  $conn->close();

  return $res;
}

function getTasks() : array {
  $conn = connectToDB();

  if (!$conn) {
    abort(500);
  }

  $sql = "SELECT t.task_id, t.is_complete, t.task_title, t.task_desc, e.employee_name, j.job_role, t.priority, t.deadline FROM `tasks` t JOIN `employees` e ON t.emp_id = e.emp_id JOIN `job_role` j ON e.job_id = j.job_id ORDER BY t.deadline DESC";

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