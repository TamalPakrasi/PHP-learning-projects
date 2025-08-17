<?php

function dumpDie($param)
{
  echo "<pre>";
  var_dump($param);
  echo "</pre>";
  die();
}

function abort(string $msg, int $code = 500)
{
  http_response_code($code);
  dumpDie($msg);
}

function redirection(string $msg, string $location = "index")
{
  header("Location: $location.php?msg=$msg");
  die();
}

function checkUserExistance(string $username, mysqli $conn): int
{
  $sql = "SELECT 
  CASE 
    WHEN EXISTS (SELECT 1 FROM `taskuser` WHERE `username` LIKE '$username') 
    THEN (SELECT `userId` FROM `taskuser` WHERE username LIKE '$username') 
    ELSE NULL 
  END AS `userId`";

  $res = mysqli_query($conn, $sql);

  if (!$res) {
    abort("Failed to check user existance", 500);
  }

  $data = (int) mysqli_fetch_row($res)[0];

  return $data;
}
