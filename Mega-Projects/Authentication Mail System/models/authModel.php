<?php

function emailQuery(string $email): bool
{
  $conn = getDB();

  if (!$conn) {
    return false;
  }

  $stmt = $conn->prepare("SELECT `email` FROM `auth` WHERE `email` = ?");

  if (!$stmt) {
    return false;
  }

  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    return false;
  }

  return true;
}
