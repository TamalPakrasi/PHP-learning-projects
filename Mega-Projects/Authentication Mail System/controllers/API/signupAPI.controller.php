<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  //get raw post data
  $raw = file_get_contents("php://input");

  $data = json_decode($raw, true);
  header("Content-Type: application/json");

  if (!signUpFormatValidation($data)) {
    sendErrorResponse(404, "Invalid Username or email or password");
  }

  list($username, $email) = $data["data"];
  
  if (!checkEmailNotInUse($email["value"])) {
    sendErrorResponse(404, "Email already in use");
  }
  
  $otp = generateOTP();
  
  if (!storeOtpToSession($otp)) {
    sendErrorResponse(500, "Something went wrong");
  }

  if (!sendOTPToEmail($otp, $email["value"], $username["value"])) {
    unset($_SESSION["otp"]);
    sendErrorResponse(500, "Failed to send email");
  }

  http_response_code(201);
  echo json_encode(["msg" => "Email Send Successfully"]);
  exit;
}

header("Allow: POST");
abort(405);
