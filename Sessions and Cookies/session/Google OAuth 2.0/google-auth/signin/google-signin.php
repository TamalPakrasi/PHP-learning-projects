<?php
require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . "/../../utils/abort.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

if (isset($_SESSION["username"]) && isset($_SESSION["email"])) {
  abortSignIn("Already signed in with an account");
}

$client = new Google\Client();
$client->setClientId($_ENV["GOOGLE_CLIENT_ID"]);
$client->setClientSecret($_ENV["GOOGLE_CLIENT_SECRET"]);
$client->setRedirectUri($_ENV["GOOGLE_SIGNIN_REDIRECT_LINK"]);
$client->addScope("email");
$client->addScope("profile");

$authUrl = $client->createAuthUrl();
