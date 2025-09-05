<?php

function validateCredentials(string $username, string $email, string $pass): bool
{
  return !(empty($username) || empty($email) || empty($pass));
}
