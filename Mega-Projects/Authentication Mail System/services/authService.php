<?php

function routeProtector(): void
{
  if (empty($_SESSION['email']) || empty($_SESSION['username'])) {
    header("Location: /login");
    exit;
  }
}

function signUpFormatValidation(array $data) : bool
{
  list($username, $email, $password) = $data["data"];

  $validUser = strlen(trim($username["value"])) > 5 && preg_match_all("/^[a-z]+(?: [a-z]+)?$/i", $username["value"]);

  $validEmail = preg_match_all("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", trim($email["value"]));

  $validPass = strlen(trim($password["value"])) > 5;

  if ($validUser && $validEmail && $validPass) {

    return true;
  } else {
    return false;
  }
}

function checkEmailNotInUse(string $email) : bool {
  return (bool) emailQuery($email);
}

function signUpService(string $username, string $email, string $password, int $otp) : bool {
  $hashPass = hashPassword($password);
  if ($otp !== $_SESSION["otp"]) {
    session_unset();
    header("Location: /signup");
    die();
  }
  return (bool) createAccountQuery($username, $email, $hashPass);
}