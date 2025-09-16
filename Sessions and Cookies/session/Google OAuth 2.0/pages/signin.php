<?php

declare(strict_types=1);
session_start();
require_once __DIR__ . "/../google-auth/signin/google-signin.php";
include_once __DIR__ . "/../handlers/message.php";
require_once __DIR__ . "/../DB/connections/dbConnect.php";
require_once __DIR__ . "/../utils/getTokenFromDB.php";

require __DIR__ . "/../vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

if (isset($_COOKIE["remember"])) {
  $rememberCookie = $_COOKIE["remember"];
  list($userID, $token) = explode(":", $rememberCookie, 2);
  $savedToken = getTokenFromDB($conn, $userID);
  if (password_verify($token, $savedToken["token"])) {
    $email = $savedToken["email"];

    $encryptionKey = hex2bin($_ENV["ENC_KEY"]);
    $iv = hex2bin($_ENV["IV"]);
    $pass = openssl_decrypt(
      $savedToken["password"],
      'AES-256-CBC',
      $encryptionKey,
      0,
      $iv
    );
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <title>Sign in</title>
</head>

<body>
  <div id="root" class="min-vh-100 bg-body-tertiary position-relative d-flex flex-column">
    <?php include_once __DIR__ . "/../components/navbar.php"; ?>
    <section class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
      <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%;">
        <h2 class="text-center mb-4">Sign In</h2>
        <form action="../handlers/signinHandler.php" method="post">
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required autocomplete="off" value="<?php echo $email ?? ""; ?>">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required autocomplete="off" value="<?php echo $pass ?? ""; ?>">
          </div>
          <div class="mb-3">
            <input type="checkbox" name="remember" id="remember" <?php echo isset($email) && isset($pass) ? "checked" : "" ?>>
            <label for="remember">Remember me</label>
          </div>
          <button type="submit" class="btn btn-primary w-100 mb-3">Sign In</button>
        </form>
        <div id="update_credentials">
          <p class="text-center">Lost your password? <span role="button" class="text-decoration-underline text-danger" id="click-pass-change">Click here</span></p>
        </div>
      </div>
    </section>
    <?php echo get_message(); ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <script>
    const clickPassChange = document.getElementById("click-pass-change");
    const updateCredentialsZone = document.getElementById("update_credentials");

    clickPassChange.addEventListener("click", (e) => {
      updateCredentialsZone.innerHTML = "";
      const htmlcontent = `<p style="font-size: 14px;">Enter your email address and we will send you a link to reset your password.</p>
          <form action="../handlers/sendEmail.php" method="post" class="mt-2 d-flex align-items-center gap-1">
            <input type="email" id="email-search" name="email-search" placeholder="Enter email" class="p-1 rounded border-1 flex-grow-1" required>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>`;

      updateCredentialsZone.innerHTML = htmlcontent;
    })
  </script>
</body>

</html>