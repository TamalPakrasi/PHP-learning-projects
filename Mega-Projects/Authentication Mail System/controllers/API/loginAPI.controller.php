<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  session_regenerate_id();
  unset($_SESSION["otp"]);

  $raw = file_get_contents("php://input");
  $data = json_decode($raw, true);
  header("Content-Type: application/json");

  $email = trim($data["email"]);

  if (checkEmailNotInUse($email)) {
    sendErrorResponse(409, "Email already in use");
  }

  $otp = generateOTP();

  if (!storeOtpToSession($otp)) {
    sendErrorResponse(500, "Something went wrong");
  }

  if (!sendOTPToEmail($otp, $email, "user")) {
    unset($_SESSION["otp"]);
    sendErrorResponse(500, "Failed to send email");
  }

  http_response_code(201);
  echo json_encode(["msg" => "Email Sent Successfully", "to" => $email]);
  exit;
}

header("Allow: POST");
abort(405);
