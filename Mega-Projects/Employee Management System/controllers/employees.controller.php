<?php

require_once __DIR__ . "/../controllers/fetchJobRoles.controller.php";
include_once __DIR__ . "/../controllers/fetchEmployeeDetails.controller.php";

$title = "Task - Employees";
$active_page = "employees";

include_once __DIR__ . "/../views/employees.view.php";