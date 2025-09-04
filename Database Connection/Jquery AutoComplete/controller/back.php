<?php

declare(strict_types=1);
require_once __DIR__ . "/../db/dbConnect.php";

function sendError(string $msg)
{
  http_response_code(404);
  header("Content-Type: application/json;Charset=UTF-8");
  echo json_encode(["message" => $msg]);
}

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["search"])) {
  $searchData = (string) trim($_GET["search"]);

  if (empty($searchData)) {
    $conn->close();
    sendError("search data cannot be empty");
    die();
  }

  $searchData = "%" . $searchData .  "%";

  $stmt = $conn->prepare("SELECT `data` FROM `jq_autocomplete` WHERE `data` LIKE ?");

  if (!$stmt) {
    $conn->close();
    sendError("Connection aborted");
    die();
  }

  $stmt->bind_param("s", $searchData);
  $stmt->execute();
  $res = $stmt->get_result();

  http_response_code(200);
  header("Content-Type: application/json;Charset=UTF-8");
  echo json_encode($res->fetch_all(MYSQLI_ASSOC));
  $conn->close();
  die();
}
