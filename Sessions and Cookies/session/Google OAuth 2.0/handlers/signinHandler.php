<?php

require_once __DIR__ . "/../DB/connections/dbConnect.php";
require_once __DIR__ . "/../utils/abort.php";
require_once __DIR__ . "/../utils/getPass.php";
require_once __DIR__ . "/../utils/getUsername.php";
require_once __DIR__ . "/../utils/signInUser.php";

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

  $hashPass = getPass($conn, $email);

  if (empty($hashPass) || !password_verify($pass, $hashPass)) {
    abortSignIn("Invalid Email or Password");
  }

  $username = getUsername($conn, $email);

  if (empty($username)) {
    abortSignIn();
  }

  signInUser($username, $email);

  exit;
}

header("Allow: POST");
http_response_code(405);
die("METHOD NOT EXIST");
