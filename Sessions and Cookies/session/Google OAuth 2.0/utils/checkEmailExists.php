<?php

function checkEmailExists(mysqli $conn, string $email): bool
{
  $stmt = $conn->prepare("SELECT `email` FROM `oauth2` WHERE `email` = ?");

  if (!$stmt) {
    return false;
  }

  $stmt->bind_param("s", $email);
  if (!$stmt->execute()) {
    return false;
  }

  $stmt->store_result();

  $exists = $stmt->num_rows > 0;
  $stmt->close();
  return $exists;
}
