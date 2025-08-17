<?php

require_once __DIR__ . "/connect.php";
require_once __DIR__ . "/function.php";

function runQuery(mysqli $conn, string $sql, string $sts) {
  $res = mysqli_query($conn, $sql);

  if ($res) {
    $msg = "Task " . $sts . " successfully";
    redirection($msg, "task");
  } else {
    abort("Failed operation", 500);
  }
}

if (isset($_GET["operation"]) && isset($_GET["id"])) {
  $operation = (string) $_GET["operation"];
  $taskId = (int) $_GET["id"];

  if ($operation === "markcomplete" && isset($_GET["status"])) {
    $isComplete = (string) $_GET["status"];

    $sql = "UPDATE `tasks` SET `isComplete`= '$isComplete' WHERE `id` = '$taskId'";

    runQuery($conn, $sql, "completed");
  } elseif ($operation === "deletetask") {
    $sql = "DELETE FROM `tasks` WHERE `id` = '$taskId' AND `isComplete` = '1'";

    runQuery($conn, $sql, "deleted");
  }
}