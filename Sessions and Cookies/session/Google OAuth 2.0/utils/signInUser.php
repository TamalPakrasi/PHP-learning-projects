<?php

use Google\Service\BeyondCorp\Resource\V;

require_once __DIR__ . "/../handlers/message.php";
require_once __DIR__ . "/../utils/setRememberCookie.php";
require_once __DIR__ . "/../DB/connections/dbConnect.php";

function removeTokenFromDB(mysqli $conn, string $userID): void
{
  $stmt = $conn->prepare("DELETE FROM `remember_user` WHERE `user_id` = ?");

  if (!$stmt) {
    return;
  }

  $stmt->bind_param("s", $userID);
  if (!$stmt->execute()) {
    return;
  }
  $stmt->close();
}

function signInUser(string $username, string $email, bool $rememberUser = false): void
{
  global $conn;
  session_regenerate_id(true);
  $_SESSION["username"] = $username;
  $_SESSION["email"] = $email;
  if ($rememberUser === true) {
    setRememberCookie($conn, $email);
  } elseif (isset($_COOKIE["remember"])) {
    $userID = explode(":", $_COOKIE["remember"], 2)[0];
    setcookie("remember", "", time() - 3600, "/");
    removeTokenFromDB($conn, $userID);
  }
  set_message("Signed in successfully");
  header("Location: http://localhost/PHP-Mini%20Projects/Sessions%20and%20Cookies/session/Google%20OAuth%202.0/pages/content.php");
  exit;
}
