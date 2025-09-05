<?php

function runInsertQuery(mysqli $conn, string $username, string $email, string $pass): bool
{
  $stmt = $conn->prepare("INSERT INTO `oauth2` (`username`, `email`, `password`) VALUES (?, ?, ?)");

  if (!$stmt) {
    return false;
  }

  $stmt->bind_param("sss", $username, $email, $pass);
  if (!$stmt->execute()) {
    return false;
  }

  $res = $stmt->affected_rows > 0;
  $stmt->close();
  return $res;
}
