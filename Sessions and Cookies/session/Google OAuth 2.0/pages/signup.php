<?php

declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <title>Create Account</title>
</head>

<body>
  <div id="root" class="min-vh-100 bg-body-tertiary position-relative d-flex flex-column">
    <?php include_once __DIR__ . "/../components/navbar.php"; ?>
    <section class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
      <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%;">
        <h2 class="text-center mb-4">Sign Up</h2>
        <form>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" class="form-control" placeholder="Enter username" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" id="email" class="form-control" placeholder="Enter email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" class="form-control" placeholder="Enter password" required>
          </div>
          <button type="submit" class="btn btn-primary w-100 mb-3">Create Account</button>
          <div class="text-center text-muted mb-2">or</div>
          <button type="button" class="btn btn-outline-danger w-100">
            <i class="bi bi-google me-2"></i> Create Account with Google
          </button>
        </form>
      </div>
    </section>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>