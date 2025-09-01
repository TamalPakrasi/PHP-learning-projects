<?php

function routeProtector(): void
{
  if (empty($_SESSION['email']) || empty($_SESSION['username'])) {
    header("Location: /login");
    exit;
  }
}

function signUpFormatValidation(...$data): bool
{
  list($username, $email, $password) = $data;

  $validUser = strlen(trim($username)) > 5 && preg_match("/^[a-z]+(?: [a-z]+)?$/i", $username);
  $validEmail = preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", trim($email));
  $validPass = strlen(trim($password)) > 5;

  return $validUser && $validEmail && $validPass;
}

function checkEmailNotInUse(string $email): bool
{
  return (bool) emailQuery($email);
}

function signUpService(string $username, string $email, string $password, int $otp): bool
{
  $hashPass = hashPassword($password);
  if ($otp !== $_SESSION["otp"]) {
    session_unset();
    header("Location: /signup");
    die();
  }
  return (bool) createAccountQuery($username, $email, $hashPass);
}

function logInService(...$data)
{
  list($email, $password, $otp) = $data;

  if (checkEmailNotInUse($email)) {
    return null;
  }

  if (!empty($password)) {
    $storedUserPass = getUserPass($email);

    if (empty($storedUserPass)) {
      return null;
    }
    $isValid = password_verify($password, $storedUserPass["pass"]);
    
    if (!$isValid) {
      return null;
    }
    
    $res = logInUserQuery($email);

    return $res ? $storedUserPass["username"] : null;
  } else {
    return true;
  }
}
