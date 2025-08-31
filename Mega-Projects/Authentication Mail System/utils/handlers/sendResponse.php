<?php

function sendErrorResponse(int $errCode = 500, string $msg = "Something went wrong"): void
{
  http_response_code($errCode);
  echo json_encode(["msg" => $msg]);
  exit;
}
