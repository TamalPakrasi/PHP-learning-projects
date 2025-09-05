<?php
require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . "/../../DB/connections/dbConnect.php";
require_once __DIR__ . "/../../utils/signInUser.php";
require_once __DIR__ . "/../../utils/abort.php";
require_once __DIR__ . "/../../utils/checkEmailExists.php";
require_once __DIR__ . "/../../utils/runInsertQuery.php";
session_start();

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$client = new Google\Client();
$client->setClientId($_ENV["GOOGLE_CLIENT_ID"]);
$client->setClientSecret($_ENV["GOOGLE_CLIENT_SECRET"]);
$client->setRedirectUri("http://localhost/PHP-Mini%20Projects/Sessions%20and%20Cookies/session/Google%20OAuth%202.0/google-auth/signup/callback.php");

if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

  if (isset($token['error'])) {
    die("Google login error: " . $token['error']);
  }

  $client->setAccessToken($token['access_token']);

  // Get user info using People API
  $people_service = new Google_Service_PeopleService($client);
  $profile = $people_service->people->get('people/me', ['personFields' => 'names,emailAddresses']);

  $username = $profile->getNames()[0]->getDisplayName();
  $email = $profile->getEmailAddresses()[0]->getValue();

  $googleId = $profile->getNames()[0]->getMetadata()->getSource()->getId();

  if (checkEmailExists($conn, $email)) {
    abortSignUp("Email Already exists");
  }

  if (!runInsertQueryGoogle($conn, $username, $email, $googleId)) {
    abortSignUp();
  }

  signInUser($username, $email);
} else {
  echo "No code from Google.";
}
