<?php

declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <title>Home</title>
</head>

<body>
  <div id="root" class="min-vh-100 bg-body-tertiary position-relative d-flex flex-column">
    <?php include_once __DIR__ . "/components/navbar.php"; ?>
    <section class="bg-light text-dark text-center d-flex flex-column justify-content-center align-items-center flex-grow-1">
      <h1 class="display-3 fw-bold">Welcome to My Website</h1>
      <p class="lead mb-4">Build modern websites with Bootstrap 5</p>
      <a href="<?php echo $_SERVER["REQUEST_URI"] . "pages/content.php" ?>" class="btn btn-primary btn-lg">Get Started</a>
    </section>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>