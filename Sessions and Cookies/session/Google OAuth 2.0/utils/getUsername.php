<?php

function getUsername(mysqli $conn, string $email): string
{
  $stmt = $conn->prepare("SELECT `username` FROM `oauth2` WHERE `email` = ?");

  if (!$stmt) {
    return "";
  }

  $stmt->bind_param("s", $email);
  if (!$stmt->execute()) {
    return "";
  }

  $stmt->bind_result($username);
  $res = $stmt->fetch();
  $stmt->close();

  return $res ? $username : "";
}
