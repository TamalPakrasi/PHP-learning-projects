<?php

require_once __DIR__ . "/../DB/connections/dbConnect.php";
require_once __DIR__ . "/../utils/abort.php";
require_once __DIR__ . "/../utils/getPass.php";
require_once __DIR__ . "/../utils/getUsername.php";
require_once __DIR__ . "/../utils/signInUser.php";

require __DIR__ . "/../vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  session_start();

  if (isset($_SESSION["message"])) {
    unset($_SESSION["message"]);
  }

  if (isset($_SESSION["username"]) && isset($_SESSION["email"])) {
    abortSignIn("Already signed in with an account");
  }

  $email = trim($_POST["email"]);
  $pass = trim($_POST["password"]);
  $rememberUser = isset($_POST["remember"]) ? true : false;

  $encPass = getPass($conn, $email);
  $encryptionKey = hex2bin($_ENV["ENC_KEY"]);
  $iv = hex2bin($_ENV["IV"]);

  $decryptedPass = openssl_decrypt(
    $encPass,
    'AES-256-CBC',
    $encryptionKey,
    0,
    $iv
  );

  if ($decryptedPass === false || $decryptedPass !== $pass) {
    abortSignIn("Invalid Email or Password");
  }

  $username = getUsername($conn, $email);

  if (empty($username)) {
    abortSignIn();
  }

  signInUser($username, $email, $rememberUser);

  exit;
}

header("Allow: POST");
http_response_code(405);
die("METHOD NOT EXIST");
