<?php

require_once __DIR__ . "/connect.php";


if (isset($_GET["operation"]) && isset($_GET["id"]) && is_numeric($_GET["id"])) {
  if ($_GET["operation"] === "markcomplete") {
    $id = $_GET["id"];
    $sql = "UPDATE `todo` SET `isComplete` = '1' WHERE `id` = {$id}";

    $res = mysqli_query($conn, $sql);

    if ($res && mysqli_affected_rows($conn) > 0) {
      $msg = "Todo is successfully marked for completion";
      header("Location: index.php?msg=$msg");
      die();
    } else {
      die("id does not exist");
    }
  } else if ($_GET["operation"] === "markdelete") {
    $id = $_GET["id"];
    $sql = "DELETE FROM `todo` WHERE `id` = {$id}";

    $res = mysqli_query($conn, $sql);

    if ($res && mysqli_affected_rows($conn) > 0) {
      $msg = "Todo deleted successfully";
      header("Location: index.php?msg=$msg");
      die();
    } else {
      die("id does not exist");
    }
  }
} else {
  die("Invalid update try");
}
