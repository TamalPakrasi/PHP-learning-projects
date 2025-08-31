<?php

function generateOTP() : int {
  return rand(1000, 9999);
}

function storeOtpToSession(int $otp) : bool {
  if (session_status() === PHP_SESSION_NONE) {
    return false;
  }

  $_SESSION["otp"] = $otp;
  return true;
}