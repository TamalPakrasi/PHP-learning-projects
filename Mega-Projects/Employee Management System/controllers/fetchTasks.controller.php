<?php

require_once __DIR__ . "/../utils/functions/abort.php";
require_once __DIR__ . "/../model/task.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  $tasks = getTasks();
} else {
  abort(400);
}