<?php

session_start();
require_once __DIR__ . "/../utils/abort.php";
require_once __DIR__ . "/../DB/connections/dbConnect.php";
require_once __DIR__ . "/../utils/getPass.php";
require_once __DIR__ . "/message.php";
require_once __DIR__ . "/../utils/updateUserPass.php";
require __DIR__ . "/../vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $pass = trim($_POST["pass"]);
  $confirmPass = trim($_POST["confirm-password"]);
  $email = filter_var($_SESSION["search-email"], FILTER_SANITIZE_EMAIL);

  if (empty($pass) && empty($confirmPass)) {
    abortSignIn("Passwords cannot be empty");
  }

  if ($pass !== $confirmPass) {
    abortSignIn("Password and confirm password did not match");
  }

  $encryptionKey = hex2bin($_ENV["ENC_KEY"]);
  $iv = hex2bin($_ENV["IV"]);

  $encPass = openssl_encrypt($pass, 'AES-256-CBC', $encryptionKey, 0, $iv);
  $storedEncPass = getPass($conn, $email);

  if ($encPass === $storedEncPass) {
    abortSignIn("New Password cannot be old password");
  }

  updateUserPass($conn, $email, $encPass);
  set_message("Password upadated successfully");
  header("Location: http://localhost/PHP-Mini%20Projects/Sessions%20and%20Cookies/session/Google%20OAuth%202.0/pages/signin.php");
  exit;
}
