<?php 

function checkEmailInUse(mysqli $conn, string $email) {
  $sql = "SELECT `email` FROM `employees` WHERE `email` LIKE '$email'";

  $res = $conn->query($sql);

  if ($res->num_rows > 0) {
    abort(404);
  }
}