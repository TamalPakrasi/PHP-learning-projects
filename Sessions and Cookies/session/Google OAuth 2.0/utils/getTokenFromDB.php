<?php

function getTokenFromDB(mysqli $conn, string $userID): array|null
{
  $stmt = $conn->prepare("SELECT o.email, o.password, r.token FROM `remember_user` `r` join `oauth2` `o` on o.id = r.user_id WHERE r.user_id = ?");

  if (!$stmt) {
    return null;
  }

  $stmt->bind_param("s", $userID);
  if (!$stmt->execute()) {
    return null;
  }

  $res = $stmt->get_result();
  $user = $res->fetch_assoc();
  return $user;
}
