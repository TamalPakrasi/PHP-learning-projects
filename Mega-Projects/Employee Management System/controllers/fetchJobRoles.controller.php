<?php

require_once __DIR__ . "/../utils/functions/abort.php";
require_once __DIR__ . "/../model/jobRoles.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  $job_roles = getJobRoles();
} else {
  abort(400);
}