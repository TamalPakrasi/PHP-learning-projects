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

function createAccountQuery(string $username, string $email, string $password): bool
{
  $conn = getDB();

  if (!$conn) {
    return false;
  }

  $stmt = $conn->prepare("INSERT INTO `auth`(`username`, `email`, `password`, `isLoggedIn`) VALUES (?, ?, ?, ?)");

  if (!$stmt) {
    return false;
  }
  $isLoggedIn = "1";
  $stmt->bind_param("sssi", $username, $email, $password, $isLoggedIn);
  $stmt->execute();

  return $stmt->affected_rows > 0;
}
