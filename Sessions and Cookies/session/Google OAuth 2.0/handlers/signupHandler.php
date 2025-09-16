<?php

require_once __DIR__ . "/../DB/connections/dbConnect.php";
require_once __DIR__ . "/../utils/validateCredentails.php";
require_once __DIR__ . "/../utils/checkEmailExists.php";
require_once __DIR__ . "/../utils/runInsertQuery.php";
require_once __DIR__ . "/../utils/signInUser.php";
require_once __DIR__ . "/../utils/abort.php";

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
    abortSignUp("Please Sign out before trying to sign up a new account");
  }

  $username = trim($_POST["username"]);
  $email = trim($_POST["email"]);
  $pass = trim($_POST["password"]);

  if (!validateCredentials($username, $email, $pass)) {
    abortSignUp("Invalid Credentials");
  }

  if (checkEmailExists($conn, $email)) {
    abortSignUp("Email already exists");
  }

  $encryptionKey = hex2bin($_ENV["ENC_KEY"]);
  $iv = hex2bin($_ENV["IV"]);
  $encryptedPassword = openssl_encrypt($pass, 'AES-256-CBC', $encryptionKey, 0, $iv);

  if (!runInsertQuery($conn, $username, $email, $encryptedPassword)) {
    abortSignUp();
  }

  signInUser($username, $email);
  exit;
}

header("Allow: POST");
http_response_code(405);
die("METHOD NOT EXIST");
