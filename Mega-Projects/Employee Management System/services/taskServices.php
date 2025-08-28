<?php

require_once __DIR__ . "/../model/employee.php";
require_once __DIR__ . "/../model/task.php";
require_once __DIR__ . "/../utils/functions/abort.php";

function assignTaskService(...$taskDetails): bool
{
  list($employee, $priority, $deadline, $task_title, $task_desc) = $taskDetails;

  if (empty($employee) || empty($priority) || empty($task_title) || empty($deadline)) {
    abort(404);
  }

  checkEmployeeExistance($employee);

  $empId = getEmployeeId($employee);

  return addTaskToDB($empId, $priority, $deadline, $task_title, $task_desc);
}
