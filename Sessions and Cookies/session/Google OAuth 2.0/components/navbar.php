<?php
$basename = "/PHP-Mini%20Projects/Sessions%20and%20Cookies/session/Google%20OAuth%202.0";
include_once __DIR__ . "/../utils/isActive.php";
?>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark fw-medium sticky-top py-2">
  <div class="container-fluid">
    <span class="navbar-brand">Facebook</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a
            class="nav-link <?php echo isActive("/"); ?>"
            href="<?php echo $basename; ?>">
            Home</a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link <?php echo isActive("/pages/content.php"); ?>"
            href="<?php echo $basename . "/pages/content.php"; ?>">
            Content</a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link <?php echo isActive("/pages/signup.php"); ?>" href="<?php echo $basename . "/pages/signup.php"; ?>">Sign up
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo isActive("/pages/signin.php"); ?>" href="<?php echo $basename . "/pages/signin.php"; ?>">Sign in</a>
        </li>
        <?php if (isset($_SESSION["username"]) && isset($_SESSION["email"])) : ?>
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo $basename . "/handlers/signoutHandler.php"; ?>">Sign out</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>