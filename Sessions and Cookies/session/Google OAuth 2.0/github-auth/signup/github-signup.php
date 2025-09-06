<?php
session_start();

require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . "/../../utils/abort.php";

if (isset($_SESSION["username"]) && isset($_SESSION["email"])) {
  abortSignUp("Already signed in with an account");
}


use League\OAuth2\Client\Provider\Github;
use Dotenv\Dotenv;

// Load .env
$dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

// Setup GitHub OAuth provider
$provider = new Github([
  'clientId'     => $_ENV['GITHUB_CLIENT_ID'],
  'clientSecret' => $_ENV['GITHUB_CLIENT_SECRET'],
  'redirectUri'  => $_ENV['GITHUB_REDIRECT_URI'],
]);

// Redirect user to GitHub
$authUrl = $provider->getAuthorizationUrl(['scope' => ['user:email']]);
$_SESSION['oauth2state'] = $provider->getState();

header('Location: ' . $authUrl);
exit;
