<?php

$inputs = [
  "username" => [
    "type" => "text",
    "placeholder" => "Enter name",
    "name" => "u_name"
  ],
  "age" => [
    "type" => "number",
    "placeholder" => "Enter age",
    "name" => "age"
  ],
  "email" => [
    "type" => "email",
    "placeholder" => "Enter Email",
    "name" => "email"
  ],
  "password" => [
    "type" => "password",
    "placeholder" => "Enter Password",
    "name" => "psw"
  ],
];

$title = "Sign up | Form to DB";
$page = "signup";

require_once __DIR__ . "/../views/signup.view.php";