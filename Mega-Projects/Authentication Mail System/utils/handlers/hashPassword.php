<?php 

function hashPassword(string $pass) : string {
  return password_hash($pass, PASSWORD_DEFAULT);
}