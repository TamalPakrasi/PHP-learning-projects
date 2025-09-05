<?php

require_once __DIR__ . "/../DB/connections/dbConnect.php";
require_once __DIR__ . "/../utils/validateCredentails.php";
require_once __DIR__ . "/../utils/checkEmailExists.php";
require_once __DIR__ . "/../utils/runInsertQuery.php";
require_once __DIR__ . "/../utils/signInUser.php";
require_once __DIR__ . "/../utils/abortSignup.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  session_start();

  if (isset($_SESSION["message"])) {
    unset($_SESSION["message"]);
  }

  $username = trim($_POST["username"]);
  $email = trim($_POST["email"]);
  $pass = trim($_POST["password"]);

  if (isset($_SESSION["username"]) && isset($_SESSION["email"])) {
    abortSignUp("Please Sign out before trying to sign up a new account");
  }

  if (!validateCredentials($username, $email, $pass)) {
    abortSignUp("Invalid Credentials");
  }

  if (checkEmailExists($conn, $email)) {
    abortSignUp("Email already exists");
  }

  $hashPass = password_hash($pass, PASSWORD_DEFAULT);

  if (!runInsertQuery($conn, $username, $email, $hashPass)) {
    abortSignUp();
  }

  signInUser($username, $email);
  exit;
}

header("Allow: POST");
http_response_code(405);
die("METHOD NOT EXIST");
