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

  return $stmt->num_rows > 0 ? false : true;
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

function getUserPass(string $email): array|bool
{
  $conn = getDB();

  if (!$conn) {
    return false;
  }

  $stmt = $conn->prepare("SELECT `username`, `password` FROM `auth` WHERE email = ?");

  if (!$stmt) {
    return false;
  }

  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($username, $pass);

  return $stmt->fetch() ? ["username" => $username, "pass" => $pass] : false;
}

function logInUserQuery(string $email): bool
{
  $conn = getDB();

  if (!$conn) {
    return false;
  }

  $stmt = $conn->prepare("UPDATE `auth` SET `isLoggedIn`='1' WHERE email = ?");

  if (!$stmt) {
    return false;
  }

  $stmt->bind_param("s", $email);
  $stmt->execute();

  return $stmt->affected_rows > 0;
}

function logoutQuery(string $email) : bool {
  $conn = getDB();

  if (!$conn) {
    return false;
  }

  $stmt = $conn->prepare("UPDATE `auth` SET `isLoggedIn`='0' WHERE email = ?");

  if (!$stmt) {
    return false;
  }

  $stmt->bind_param("s", $email);
  $stmt->execute();

  return $stmt->affected_rows > 0;
}

function getUsername(string $email) : string|bool {
  $conn = getDB();

  if (!$conn) {
    return false;
  }

  $stmt = $conn->prepare("SELECT `username` FROM `auth` WHERE email = ?");

  if (!$stmt) {
    return false;
  }

  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($username);

  return $stmt->fetch() ? $username : false;
}

function checkLogInStatus(string $email) : bool {
  $conn = getDB();

  if (!$conn) {
    return false;
  }

  $stmt = $conn->prepare("SELECT `isLoggedIn` FROM `auth` WHERE email = ? AND `isLoggedIn` = '1'");

  if (!$stmt) {
    return false;
  }

  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  return $stmt->num_rows > 0;
}