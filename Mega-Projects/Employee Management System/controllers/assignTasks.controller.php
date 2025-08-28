<?php

require_once __DIR__ . "/../utils/functions/abort.php";
require_once __DIR__ . "/../services/taskServices.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $employee = (string) $_POST["employee"];
  $priority = (string) $_POST["priority"];
  $deadline = (string) $_POST["due_date"];
  $task_title = (string) trim($_POST["task_title"]);
  $task_desc = (string) trim($_POST["task_desc"]);

  if (assignTaskService($employee, $priority, $deadline, $task_title, $task_desc)) {
    header("Location: /");
    die();
  } else {
    abort(500);
  }
} else {
  abort(400);
}
