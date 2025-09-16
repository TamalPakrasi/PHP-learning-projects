<?php

function  getUserID(mysqli $conn, string $email): string
{
  $stmt = $conn->prepare("SELECT `id` FROM `oauth2` WHERE `email` = ?");

  if (!$stmt) {
    return "";
  }

  $stmt->bind_param("s", $email);
  if (!$stmt->execute()) {
    return "";
  }

  $stmt->bind_result($id);
  $res = $stmt->fetch();
  $stmt->close();

  return $res ? $id : "";
}

function setRememberTokenToDB(mysqli $conn, string $hashedToken, string $userID): bool
{
  $stmt = $conn->prepare("INSERT INTO `remember_user` (`user_id`, `token`) VALUES (?, ?)");

  if (!$stmt) {
    return false;
  }

  $stmt->bind_param("ss", $userID, $hashedToken);
  if (!$stmt->execute()) {
    return false;
  }

  $res = $stmt->affected_rows > 0;
  $stmt->close();
  return $res;
}

function updateRememberTokenToDB(mysqli $conn, string $hashedToken, string $userID): void
{
  $stmt = $conn->prepare("UPDATE `remember_user` SET `token`= ? WHERE `user_id` = ?");

  if (!$stmt) {
    return;
  }

  $stmt->bind_param("ss", $hashedToken, $userID);
  if (!$stmt->execute()) {
    return;
  }
  $stmt->close();
}

function setRememberCookie(mysqli $conn, string $email): void
{
  $userID = getUserID($conn, $email);
  $token = bin2hex(random_bytes(32));
  $hashedToken = password_hash($token, PASSWORD_DEFAULT);
  if (isset($_COOKIE["remember"])) {
    $savedUserID = explode(":", $_COOKIE["remember"], 2)[0];
    if ($userID === $savedUserID) {
      updateRememberTokenToDB($conn, $hashedToken, $userID);
      setcookie("remember", $userID . ":" . $token, time() + 10 * 86400, "/");
      return;
    }
  }
  if (setRememberTokenToDB($conn, $hashedToken, $userID)) {
    setcookie("remember", $userID . ":" . $token, time() + 10 * 86400, "/");
    return;
  }
}
