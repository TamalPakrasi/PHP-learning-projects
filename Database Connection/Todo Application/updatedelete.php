<?php

require_once __DIR__ . "/connect.php";

function sendResponse($sql, $filters, $msg)
{
  global $conn;
  $res = mysqli_query($conn, $sql);
  if ($res && mysqli_affected_rows($conn) > 0) {
    $completion = $filters["completion-filter"];
    $priority = $filters["priority-filter"];
    header("Location: index.php?msg=$msg&complete=$completion&priority=$priority");
    die();
  } else {
    die("id does not exist");
  }
}


if (isset($_GET["operation"]) && isset($_GET["id"]) && is_numeric($_GET["id"])) {
  if ($_GET["operation"] === "markcomplete") {
    $id = $_GET["id"];

    if (isset($_GET["filter"])) {
      $filters = json_decode($_GET["filter"], true);
    } else {
      die("Something went wrong");
    }

    $sql = "UPDATE `todo` SET `isComplete` = '1' WHERE `id` = {$id}";

    $msg = "Todo is successfully marked for completion";
    sendResponse($sql, $filters, $msg);
  } else if ($_GET["operation"] === "markdelete") {
    $id = $_GET["id"];

    if (isset($_GET["filter"])) {
      $filters = json_decode($_GET["filter"], true);
    } else {
      die("Something went wrong");
    }

    $sql = "DELETE FROM `todo` WHERE `id` = {$id}";

    $msg = "Todo deleted successfully";
    sendResponse($sql, $filters, $msg);
  } else if ($_GET["operation"] === "markedit") {
    $id = $_GET["id"];

    if (isset($_GET["filter"])) {
      $filters = json_decode($_GET["filter"], true);
    } else {
      die("Something went wrong");
    }

    if (!isset($_POST["todo"]) || !isset($_POST["priority"])) die("insufficient data");

    $todo = $_POST["todo"];
    $priority = $_POST["priority"];


    $sql = "UPDATE `todo` SET `todo` = '$todo', `priority` = '$priority' WHERE `id` = {$id}";

    $msg = "Todo is edited successfully";
    sendResponse($sql, $filters, $msg);
  } else {
    die("Invalid operations");
  }
} else {
  die("Invalid update try");
}
