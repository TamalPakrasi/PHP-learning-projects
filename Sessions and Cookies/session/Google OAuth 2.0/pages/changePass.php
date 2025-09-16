<?php

declare(strict_types=1);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <title>Change Pass</title>
</head>

<body>
  <div id="root" class="min-vh-100 bg-body-tertiary position-relative d-flex flex-column justify-content-center align-items-center">
    <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%;">
      <h2 class="text-center mb-4">Change Password</h2>
      <form action="../handlers/changePassHandler.php" method="post">
        <div class="mb-3">
          <label for="pass" class="form-label">Enter New Password</label>
          <input type="password" id="pass" name="pass" class="form-control" required autocomplete="off">
        </div>
        <div class="mb-3">
          <label for="confirm-password" class="form-label">Confirm New Password</label>
          <input type="password" id="confirm-password" name="confirm-password" class="form-control" required autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary w-100 mb-3">Change Password</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>