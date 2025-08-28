<?php

require_once __DIR__ . "/fetchEmployees.controller.php";
require_once __DIR__ . "/fetchTasks.controller.php";

$title = "Task - Management";
$active_page = "tasks";

include_once __DIR__ . "/../views/management.view.php";