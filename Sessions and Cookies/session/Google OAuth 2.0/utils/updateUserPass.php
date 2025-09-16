<?php

function updateUserPass(mysqli $conn, string $email, string $encPass): void
{
  $stmt = $conn->prepare("UPDATE `oauth2` SET `password`= ? WHERE `email` = ?");

  if (!$stmt) {
    return;
  }

  $stmt->bind_param("ss", $encPass, $email);
  if (!$stmt->execute()) {
    return;
  }
  $stmt->close();
}
