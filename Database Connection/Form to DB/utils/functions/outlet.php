<?php

function outlet(string $page): string
{
  switch ($page) {
    case 'home':
      return "/homeOutlet.partial.php";
    case 'signin':
      return "/signinOutlet.partial.php";
    case 'signup':
      return "/signupOutlet.partial.php";
    default:
      return "";
  }
}