<?php

function runInsertQuery(mysqli $conn, string $username, string $email, string $pass): bool
{
  $stmt = $conn->prepare("INSERT INTO `oauth2` (`username`, `email`, `password`, `auth_style`) VALUES (?, ?, ?, ?)");

  if (!$stmt) {
    return false;
  }

  $auth_style = "local";
  $stmt->bind_param("ssss", $username, $email, $pass, $auth_style);
  if (!$stmt->execute()) {
    return false;
  }

  $res = $stmt->affected_rows > 0;
  $stmt->close();
  return $res;
}

function runInsertQueryGoogle(mysqli $conn, string $username, string $email, string $googleID): bool
{
  $stmt = $conn->prepare("INSERT INTO `oauth2` (`username`, `email`, `google_id`, `auth_style`) VALUES (?, ?, ?, ?)");

  if (!$stmt) {
    return false;
  }

  $auth_style = "google";
  $stmt->bind_param("ssss", $username, $email, $googleID, $auth_style);
  if (!$stmt->execute()) {
    return false;
  }

  $res = $stmt->affected_rows > 0;
  $stmt->close();
  return $res;
}

function runInsertQueryGithub(mysqli $conn, string $username, string $email, string $githubId): bool
{
  $stmt = $conn->prepare("INSERT INTO `oauth2` (`username`, `email`, `github_id`, `auth_style`) VALUES (?, ?, ?, ?)");

  if (!$stmt) {
    return false;
  }

  $auth_style = "github";
  $stmt->bind_param("ssss", $username, $email, $githubId, $auth_style);
  if (!$stmt->execute()) {
    return false;
  }

  $res = $stmt->affected_rows > 0;
  $stmt->close();
  return $res;
}
