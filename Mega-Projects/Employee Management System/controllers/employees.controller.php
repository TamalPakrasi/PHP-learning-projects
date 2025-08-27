<?php

include_once __DIR__ . "/../services/fetchJobRoles.php";
include_once __DIR__ . "/../services/fetchEmployeeDetails.php";

$title = "Task - Employees";
$active_page = "employees";

include_once __DIR__ . "/../views/employees.view.php";