<?php

require_once __DIR__ . "/connect.php";
require_once __DIR__ . "/function.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET["operation"])) {

  $opt = $_GET["operation"];

  if ($opt === "adduser") {

    $newUser = (string) $_POST["adduser"];

    $sql = "INSERT INTO `taskuser`(`username`) VALUES ('$newUser')";

    $resUsers = mysqli_query($conn, $sql);

    if ($resUsers) {
      redirection("New User added successfully", "index");
    } else {
      abort("Failed to add new user", 500);
    }
  } elseif ($opt === "addtask") {

    $task = (string) $_POST["addtask"];
    $worker = (string) $_POST["worker"] ?? "";
    $priority = (string) $_POST["priority"] ?? "";

    if (empty($worker) || empty($priority)) {
      abort("Invalid priority or worker!", 404);  
    }
    
    $userId = (int) checkUserExistance($worker, $conn);

    $sql = "INSERT INTO `tasks`(`userId`, `task`, `priority`) VALUES ('$userId','$task','$priority')";

    $resTask = mysqli_query($conn, $sql);

    if ($resTask) {
      redirection("Task added successfully", "task");
    } else {
      abort("Failed to add task", 500);
    }
  }
}
