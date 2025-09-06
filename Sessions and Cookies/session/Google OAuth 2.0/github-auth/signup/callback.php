<?php
session_start();

require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . "/../../DB/connections/dbConnect.php";
require_once __DIR__ . "/../../utils/signInUser.php";
require_once __DIR__ . "/../../utils/checkEmailExists.php";
require_once __DIR__ . "/../../utils/runInsertQuery.php";

use League\OAuth2\Client\Provider\Github;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$provider = new Github([
  'clientId'     => $_ENV['GITHUB_CLIENT_ID'],
  'clientSecret' => $_ENV['GITHUB_CLIENT_SECRET'],
  'redirectUri'  => $_ENV['GITHUB_REDIRECT_URI'],
]);

// Check for error or invalid state
if (isset($_GET['error'])) {
  exit('Error: ' . htmlspecialchars($_GET['error']));
}
if (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
  unset($_SESSION['oauth2state']);
  exit('Invalid state');
}

// Exchange code for token
$token = $provider->getAccessToken('authorization_code', [
  'code' => $_GET['code']
]);

try {
  $user = $provider->getResourceOwner($token);
  $data = $user->toArray();

  $githubId = $data['id'];
  $username = $data['login'];
  $email = $data['email'] ?? null; // may be null if private

  // 🔽 Fallback: fetch primary verified email if null
  if ($email === null) {
    try {
      $request = $provider->getAuthenticatedRequest(
        'GET',
        'https://api.github.com/user/emails',
        $token
      );
      $emails = $provider->getParsedResponse($request);

      foreach ($emails as $e) {
        if (!empty($e['primary']) && !empty($e['verified'])) {
          $email = $e['email'];
          break;
        }
      }
    } catch (Exception $ex) {
      // Log this in production
      $email = null;
    }
  }

  // If still null → you may need to ask user for email
  if ($email === null) {
    throw new Exception("We couldn’t fetch your email from GitHub. Please sign up with your other ways instead.");
  }

  if (checkEmailExists($conn, $email)) {
    throw new Exception("Email already exists");
  }

  if (!runInsertQueryGithub($conn, $username, $email, $githubId)) {
    throw new Exception("Something wrong");
  }

  signInUser($username, $email);
} catch (Exception $e) {
  abortSignUp($e->getMessage());
}
