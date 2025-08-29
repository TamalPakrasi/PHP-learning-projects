<?php

require_once __DIR__ . "/../model/task.php";
require_once __DIR__ . "/../model/employee.php";
require_once __DIR__ . "/../utils/functions/abort.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  $tasks = getTasks();
  $employees = getEmployees();
  $title = "Task - Management";
  $active_page = "tasks";

  include_once __DIR__ . "/../views/management.view.php";
} else {
  abort(400);
}
