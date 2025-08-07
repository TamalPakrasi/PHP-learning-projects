<?php

require_once __DIR__ . "/connect.php";

if (isset($_GET["operation"])) {
  if ($_GET["operation"] === "removeallcomplete") {
    $sql = "DELETE FROM `todo` WHERE `isComplete` = '1'";

    $res = mysqli_query($conn, $sql);

    if ($res && mysqli_affected_rows($conn) > 0) {
      $msg = "Remove all completed todos successfully";
      header("Location: index.php?msg=$msg");
      die();
    } else {
      die("no incomplete todo found");
    }
  } else {
    die("invalid operation");
  }
} else {
  die("Invalid Request");
}
