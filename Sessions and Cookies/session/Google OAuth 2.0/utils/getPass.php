<?php

function getPass(mysqli $conn, string $email): string
{
  $stmt = $conn->prepare("SELECT `password` FROM `oauth2` WHERE `email` = ?");

  if (!$stmt) {
    return "";
  }

  $stmt->bind_param("s", $email);
  if (!$stmt->execute()) {
    return "";
  }

  $stmt->bind_result($pass);
  $res = $stmt->fetch();
  $stmt->close();

  return $res ? $pass : "";
}
